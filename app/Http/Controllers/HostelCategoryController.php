<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\HostelCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HostelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', HostelCategory::class);
        $hostelCategories =  HostelCategory::with(['hostels', 'hostels.hostelAssigns'])->get();
        return view('admin.hostelCategories.index', compact('hostelCategories'));
    }

    public function getHostels($id)
    {
        try{
            $hostels = Hostel::where('hostel_category_id', $id)->get();
            return response()->json(['success'=>true, 'message'=>'hostels fetch successfully', 'hostels'=>$hostels], 200);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => 'something went wrong' . $ex->getMessage()], 409);
        }
    }

    // delete hostelcategory photo
    public function deletePhoto(Request $request, HostelCategory $hostelCategory)
    {
        try{
            if($hostelCategory->photos()->count() > 1){
                $photo = $hostelCategory->photos()->where('id', $request->id)->first();
                $destination_path = public_path('img/hostelCategories');
                if($photo){
                    unlink($destination_path.'/'.$photo->name);
                    $photo->delete();
                }

                return redirect()->back()->with('success', 'hostel Category Photo deleted successfully!');
            }
            else{
                return redirect()->back()->with('error', 'You can not delete all hostel Category photos!');
            }
        }catch(Exception $ex){
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', HostelCategory::class);

        return view('admin.hostelCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', HostelCategory::class);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'address' => 'required|string',
            'total_bed_per_room' => 'required|numeric',
            'gender' => 'required|string',
            'status' => 'nullable|numeric',
            'facilities' => 'required|array',
            'photos'  => 'bail|required|max:4',
            'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        try{

            DB::beginTransaction();

            $hostel = auth('admin')->user()->hostelCategories()->create([
                'name' => ucwords($request->name),
                'description' => $request->description,
                'amount' => $request->amount,
                'address' => $request->address,
                'total_bed_per_room' => $request->total_bed_per_room,
                'gender' => $request->gender,
                'facilities' => json_encode($request->facilities)
            ]);


            if ($files = $request->file('photos')) {

                foreach ($files as $file) {
                    $pad = Str::random(5);
                    $name = 'hostelcat_'.time()."_".$pad.".".$file->extension();
                    $file->move(public_path('img/hostelcategories'), $name);
                    $hostel->photos()->create(['name' => $name]);
                }
            }
            DB::commit();


            return redirect()->back()->with('success', 'hostel Category create Succesfully');

        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HostelCategory  $hostelCategory
     * @return \Illuminate\Http\Response
     */
    public function show(HostelCategory $hostelCategory)
    {
        $this->authorize('view', $hostelCategory);

        return view('admin.hostelCategories.show', compact('hostelCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostelCategory  $hostelCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(HostelCategory $hostelCategory)
    {
        $this->authorize('update', $hostelCategory);

        return view('admin.hostelCategories.edit', compact('hostelCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HostelCategory  $hostelCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostelCategory $hostelCategory)
    {
        $this->authorize('update', $hostelCategory);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'address' => 'required|string',
            'total_bed_per_room' => 'required|numeric',
            'gender' => 'required|string',
            'status' => 'string',
            'facilities' => 'required|array',
            'photos'  => 'bail|max:4',
            'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        try{

            $hostelCategory->update([
                'name' => ucwords($request->name),
                'description' => $request->description,
                'amount' => $request->amount,
                'address' => $request->address,
                'total_bed_per_room' => $request->total_bed_per_room,
                'gender' => $request->gender,
                'facilities' => json_encode($request->facilities),
                'status' => isset($request->status) ? '1' : '0'
            ]);

            if ($files = $request->file('photos')) {
                if (($hostelCategory->photos()->count() >= 4) || (($hostelCategory->photos()->count() + count($files)) > 4)) {
                    // helper session
                    session()->flash('error', 'hostel Category photo has reached maximum of 4');
                    return redirect()->back();
                } else {

                    DB::beginTransaction();

                    foreach ($files as $file) {
                        $pad = Str::random(5);
                        $name = 'hostelcat_'.time()."_".$pad.".".$file->extension();
                        $file->move(public_path('/img/hostelcategories'), $name);
                        $hostelCategory->photos()->create(['name' => $name]);
                    }
                    DB::commit();
                }
            }
            return redirect()->back()->with('success', 'hostel Category updated Succesfully');

        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostelCategory  $hostelCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostelCategory $hostelCategory)
    {
        //
    }
}
