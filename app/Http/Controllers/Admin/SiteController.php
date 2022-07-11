<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::first();
        return view('admin.sitelogo', compact('site'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Site $site)
    {
        Validator::make(
            $request->all(),
            [
                'site_logo' => 'required|mimes:png,jpg,jpeg,ico|image|max:1024'
            ]
        )->validate();

        try{

            if(!file_exists(public_path('/img/brand')))
            mkdir(public_path('/img/brand'), 0777);

            $destination_path = public_path('/img/brand');

            if($site->site_logo){
                //delete
                unlink($destination_path.'/'.$site->site_logo);
            }

            $file = $request->file('site_logo');
            $name = 'logo_'.time().'.'.$file->extension();

            $input['site_logo'] = $name;
            $file->move($destination_path, $name);

            $site->updateOrCreate(['id' => 1], $input);

            return back()->with('success', 'Logo uploaded successfully');
        }catch(Exception $ex){
            return back()->with('error', 'something went wrong ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
