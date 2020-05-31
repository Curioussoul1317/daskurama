<?php

namespace App\Http\Controllers;

use App\pages;
use Illuminate\Http\Request;
use File;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
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
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(pages $pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pages $pages)
    {
        $this->validate($request, [
            'id' => 'required',
           
        ]);
        
 
        if ($request->hasFile('Cover_img')) {
            $imagedelete = $request->input('edit_Page');
            File::delete('public/pages', $imagedelete);
            $filenamewithExt = $request->file('Cover_img')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Cover_img')->getClientOriginalExtension();
            $Imagename = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('Cover_img')->storeAs('public/pages', $Imagename);
        } else {
            $Imagename = $request->input('edit_Page');
        }


        if ($request->hasFile('Cover_Audio')) {
            $audiodelete = $request->input('edit_Audio');
            File::delete('public/audio', $audiodelete);
            $filenamewithExt = $request->file('Cover_Audio')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Cover_Audio')->getClientOriginalExtension();
            $AudioName = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('Cover_Audio')->storeAs('public/audio', $AudioName);
        } else {
            $AudioName = $request->input('edit_Audio');
        }


        $pages = pages::find($request->id);
        $pages->pages = ($Imagename);
        $pages->audio = ($AudioName);
        $pages->save();
        $successinfo = (' Pages Updated ');
        return redirect()->back()->with('success', $successinfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(pages $pages)
    {
        //
    }
}
