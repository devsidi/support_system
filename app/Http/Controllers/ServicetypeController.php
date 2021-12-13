<?php

namespace App\Http\Controllers;

use App\Models\servicetype;
use Illuminate\Http\Request;

class ServicetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $service = servicetype::all();
        return view('service', compact('service'));
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
        $status = 'ACTIVE';
        servicetype::create([  
            'name'=>$request->service,
            'status'=>$status, 
        ]); 
        return redirect()->back()->with('msg','Service has been added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function show(servicetype $servicetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function editservice($id)
    {
        $service=servicetype::find($id);
        return view ('editservice', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $data = servicetype::find($id);
        $data->name=$request->service;
        $data->status=$request->status;

        $data->save();

        return redirect()->back()->with('msg','Service has been updated!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = servicetype::find($id);
        $data->delete();

        return redirect()->back()->with('del','Service has been deleted!!');

    } 
}
