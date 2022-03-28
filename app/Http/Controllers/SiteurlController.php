<?php

namespace App\Http\Controllers;

use App\Models\Siteurl;
use Illuminate\Http\Request;

class SiteurlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $data = Siteurl::orderBy('id', 'desc')->paginate(5);
        return view('url.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('url.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    
        $input = $request->all();
        Siteurl::create($input);
    
        return redirect()->route('index')
            ->with('success', 'Site url created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siteurl  $siteurl
     * @return \Illuminate\Http\Response
     */
    public function show(Siteurl $siteurl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siteurl  $siteurl
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Siteurl::find($id);    
        return view('url.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siteurl  $siteurl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $site = Siteurl::find($id);
        $site->update($input);

       
        return redirect()->route('index')
            ->with('success', 'Site Url updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siteurl  $siteurl
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           Siteurl::find($id)->delete();
        return redirect()->route('index')
            ->with('success', 'Site Url deleted successfully.');
    }
}
