<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSlide;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomePageSlide::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
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
        Validator::make(
            $request->all(),
            [
                'image' => 'required|mimes:png,jpg,jpeg,ico|image|max:2048'
            ]
        )->validate();

        try{

            if(!file_exists(public_path('/img/sliders')))
            mkdir(public_path('/img/sliders'), 0777);

            $destination_path = public_path('/img/sliders');

            // if($site->image){
            //     //delete
            //     unlink($destination_path.'/'.$site->image);
            // }

            $file = $request->file('image');
            $name = 'slider_'.time().'.'.$file->extension();

            $input['image'] = $name;
            $file->move($destination_path, $name);

            HomePageSlide::create($input);

            return back()->with('success', 'Slide uploaded successfully');
        }catch(Exception $ex){
            return back()->with('error', 'something went wrong ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePageSlide  $homePageSlide
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageSlide $homePageSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageSlide  $homePageSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageSlide $homePageSlide)
    {
        return view('admin.sliders.edit', compact('homePageSlide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePageSlide  $homePageSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePageSlide $homePageSlide)
    {

        Validator::make(
            $request->all(),
            [
                'image' => 'required|mimes:png,jpg,jpeg,ico|image|max:2048'
            ]
        )->validate();

        try{

            $destination_path = public_path('/img/sliders');

            if($homePageSlide->image){
                //delete
                unlink($destination_path.'/'.$homePageSlide->image);
            }

            $file = $request->file('image');
            $name = 'slider_'.time().'.'.$file->extension();

            $input['image'] = $name;
            $file->move($destination_path, $name);

            $homePageSlide->update($input);

            return back()->with('success', 'Slide updated successfully');
        }catch(Exception $ex){
            return back()->with('error', 'something went wrong ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageSlide  $homePageSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageSlide $homePageSlide)
    {
        try {
            $destination_path = public_path('/img/sliders');
            //delete
            unlink($destination_path.'/'.$homePageSlide->image);
            $homePageSlide->delete();
            return redirect()->back()->with('success', 'Slide deleted Successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }
}
