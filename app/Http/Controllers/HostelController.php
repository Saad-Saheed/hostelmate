<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\HostelCategory;
use Exception;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Hostel::class);
        $hostels = Hostel::all();
        $hostelCategories = HostelCategory::all();
        return view('admin.hostels.index', compact('hostels', 'hostelCategories'));
    }

    public function getBedNo($id)
    {
        try{
            $hostel = Hostel::find($id);
            $bed_no = $hostel->total_bed ?? $hostel->hostelCategory->total_bed_per_room;
            return response()->json(['success'=>true, 'message'=>'Bed No fetch successfully', 'bed_no'=>$bed_no], 200);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Something went wrong' . $ex->getMessage()], 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Hostel::class);
        $hostelCategories = HostelCategory::all();
        return view('admin.hostels.create', compact('hostelCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Hostel::class);
        $request->validate([
            'hostelcategory' => 'required|numeric',
            'block_name' => 'required|string',
            'room_no' => 'required|string',
            'total_bed' =>'nullable|numeric'
        ]);

        try{

            $hostel = Hostel::where([
                'room_no'=>$request->room_no,
                'hostel_category_id'=>$request->hostelcategory,
                'room_no' => $request->room_no,
            ])->exists();

            if($hostel){
                return redirect()->back()->with('error', "Hostel Room Exists!");
            }

            Hostel::create([
                'hostel_category_id' => $request->hostelcategory,
                'block_name' => ucwords($request->block_name),
                'room_no' => $request->room_no,
                'total_bed' => $request->total_bed
            ]);

            return redirect()->back()->with('success', 'hostel Room Created Succesfully');

        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        $this->authorize('view', $hostel);

        return view('admin.hostels.show', compact('hostel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostel $hostel)
    {
        $this->authorize('update', $hostel);
        $hostelCategories = HostelCategory::all();
        return view('admin.hostels.edit', compact('hostel', 'hostelCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        $this->authorize('update', $hostel);
        $request->validate([
            'hostelcategory' => 'required|numeric',
            'block_name' => 'required|string',
            'room_no' => 'required|string',
            'total_bed' =>'nullable|numeric',
            'status' => 'string'
        ]);

        try{

            $hostel->update([
                'hostel_category_id' => $request->hostelcategory,
                'block_name' => ucwords($request->block_name),
                'room_no' => $request->room_no,
                'total_bed' => $request->total_bed,
                'status' => isset($request->status) ? '1' : '0'
            ]);

            return redirect()->back()->with('success', 'hostel updated Succesfully');

        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        $this->authorize('delete', $hostel);
        try{
            $hostel->delete();
            return redirect()->back()->with('success', 'hostel deleted Succesfully');
        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }


}
