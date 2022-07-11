<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\HostelAssign;
use App\Models\HostelCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class HostelAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', HostelAssign::class);

        $hostelAssigns = HostelAssign::with(['user', 'hostel'])->get();
        return view('admin.hostelAssign.index', compact('hostelAssigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', HostelAssign::class);

        $students = User::select('student_id', 'id')->get();
        $hostels = Hostel::all();
        $hostelCategories = HostelCategory::all();
        return view('admin.hostelAssign.create', compact('hostels', 'hostelCategories', 'students','students'));
    }

    public function checkBedSpace($hostel_id, $bed_no)
    {
        // check if selected hostel full yet
        $this_hostel = Hostel::with('hostelCategory', 'hostelAssigns')->find($hostel_id);
        $this_hostel_total_bed = $this_hostel->total_bed;
        $this_hostel_category_total_bed = $this_hostel->hostelCategory->total_bed_per_room;
        $student_assigned = $this_hostel->hostelAssigns();
        $student_assigned_count = $student_assigned->count();

        // if this bed has been assigned to other student
        if($student_assigned->where(['bed_no' => $bed_no, 'hostel_id' => $hostel_id])->exists()){
            session()->flash('error', "Bed No $bed_no has been Occupied");
            return false;
        }

        if (!empty($this_hostel_total_bed)) {

            if ($student_assigned_count >= $this_hostel_total_bed) {
                session()->flash('error', 'The Room Bed Space has been Occupied');
                return false;
            }
        } else {
            if ($student_assigned_count >= $this_hostel_category_total_bed) {
                session()->flash('error', 'The Room Bed Space, for this hostel category has been Occupied');
                return false;
            }
        }

        return true;
    }

    public function checkGender($hostel_id, $user_id)
    {
        $this_hostel = Hostel::with('hostelCategory', 'hostelAssigns')->find($hostel_id);
        $this_user = User::with('department', 'hostelAssign')->find($user_id);

        if($this_hostel->hostelCategory->gender != $this_user->gender){
            session()->flash('error', "This hostel Category is for ONLY {$this_hostel->hostelCategory->gender}");
            return false;
        }

        return true;
    }

    public function geneticAlgo()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', HostelAssign::class);
        $request->validate([
            'bed_no' => 'required|numeric',
            'hostel_id' => 'required|numeric',
            'user_id' => 'required|required'
        ]);

        try {

            if(!$this->checkBedSpace($request->hostel_id, $request->bed_no) || !$this->checkGender($request->hostel_id, $request->user_id)){
                return redirect()->back();
            }

            // $this->geneticAlgo();

            $student = User::find($request->user_id);
            // delete all other hostel assigned to this student
            $student->hostelAssign()->delete();

            //new hostel assignment
            HostelAssign::create([
                'hostel_id' => $request->hostel_id,
                'bed_no' => $request->bed_no,
                'user_id' => $request->user_id
            ]);

            return redirect()->back()->with('success', 'hostel Assigned Succesfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Http\Response
     */
    public function show(HostelAssign $hostelAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Http\Response
     */
    public function edit(HostelAssign $hostelAssign)
    {
        $this->authorize('update', $hostelAssign);
        $students = User::select('student_id', 'id');
        return view('admin.hostelAssign.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostelAssign $hostelAssign)
    {
        $this->authorize('update', $hostelAssign);
        $request->validate([
            'bed_no' => 'required|numeric',
            'hostel_id' => 'required|numeric',
            'user_id' => 'required|required'
        ]);

        try {

            if(!$this->checkBedSpace($request->hostel_id, $request->bed_no) || !$this->checkGender($request->hostel_id, $request->user_id)){
                return redirect()->back();
            }

            $student = User::find($request->user_id);
            // delete all other hostel assigned to this student
            $student->hostelAssign()->where('id', '!=', $hostelAssign->id)->delete();

            //update hostel assignment
            $hostelAssign->update([
                'hostel_id' => $request->hostel_id,
                'bed_no' => $request->bed_no,
                'user_id' => $request->user_id
            ]);

            return redirect()->back()->with('success', 'hostel Re-Assigned Succesfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostelAssign $hostelAssign)
    {
        $this->authorize('delete', $hostelAssign);
        try {

            $hostelAssign->delete();
            return redirect()->back()->with('success', 'hostel Assigned deleted Succesfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
