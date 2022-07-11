<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use App\Models\Testimony;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::latest()->get();
        return view('admin.testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'occupation' => 'required|string',
            'image'=> 'required|mimes:png,jpg,jpeg|image|max:1024',
            'comment' =>'required|string'
        ]);

        try {

            $input = $request->only(['name', 'comment', 'occupation']);

            if($request->hasFile('image')){

                if(!file_exists(public_path('/img/testimonies')))
                mkdir(public_path('/img/testimonies'), 0777);

                $destination_path = public_path('/img/testimonies');

                // if($user->image){
                //     //delete
                //     unlink($destination_path.'/'.auth()->user()->image);
                // }

                $file = $request->file('image');
                $name = 'user_'.time().'.'.$file->extension();

                $input['image'] = $name;
                $file->move($destination_path, $name);
            }

            if (Testimony::create($input))
                Session::flash('success', 'Testimony created Successfully');
            else
                Session::flash('error', 'Unable to create Testimony.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {
        return view('admin.testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'occupation' => 'required|string',
            'image'=> 'nullable|mimes:png,jpg,jpeg|image|max:1024',
            'comment' =>'required|string'
        ]);

        try {

            $input = $request->only(['name', 'comment', 'occupation']);

            if($request->hasFile('image')){

                // if(!file_exists(public_path('/img/testimonies')))
                // mkdir(public_path('/img/testimonies'), 0777);

                $destination_path = public_path('/img/testimonies');

                if($testimony->image){
                    //delete
                    unlink($destination_path.'/'.auth()->user()->image);
                }

                $file = $request->file('image');
                $name = 'user_'.time().'.'.$file->extension();

                $input['image'] = $name;
                $file->move($destination_path, $name);
            }

            if ($testimony->update($input))
                Session::flash('success', 'Testimony updated Successfully');
            else
                Session::flash('error', 'Unable to update Testimony.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        try {
            $destination_path = public_path('/img/testimonies');
            //delete
            unlink($destination_path.'/'.$testimony->image);
            $testimony->delete();
            return redirect()->back()->with('success', 'Testimony deleted Successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }
}
