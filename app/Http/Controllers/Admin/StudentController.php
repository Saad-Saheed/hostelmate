<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAnyStudent', Admin::class);
        $students = User::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createStudent', Admin::class);
        $departments = Department::all();
        return view('admin.students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('createStudent', Admin::class);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'student_id' => ['required', 'string', 'max:25', 'unique:users'],
            'department_id' => ['required', 'numeric'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'level' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'student_id' => strtoupper($request->student_id),
                'department_id' => $request->department_id,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'level' => $request->level,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            return redirect()->back()->with('success', 'Student Register Succesfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $this->authorize('updateStudent', Admin::class);
        $departments = Department::all();
        return view('admin.students.edit', compact('departments', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $this->authorize('updateStudent', Admin::class);

        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'student_id' => ['required', 'string', 'max:25', "unique:users,student_id,$student->id"],
            'department_id' => ['required', 'numeric'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'status' => ['string'],
            'level' => ['required', 'string']
        ]);

        try {
            $user = $student->update([
                'name' => $request->name,
                'student_id' => strtoupper($request->student_id),
                'department_id' => $request->department_id,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'level' => $request->level,
                'status' => isset($request->status) ? '1' : '0'
            ]);

            return redirect()->back()->with('success', 'Student Info Updated Succesfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
