<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\requestform;
use App\Models\department;
use App\Models\servicetype;
use App\Models\supportagent;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listing = requestform::where('STATUS','NEW')->get();
        return view('admin', compact('listing'));
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function appcase($id)
    {
        $listing=requestform::find($id); 
        $service = servicetype::all();
        $department = department::all(); 
        $supportagent = supportagent::where('status','ACTIVE')->get(); 
        return view ('appcase', compact('listing','service','department','supportagent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function updatecase($id, Request $request)
    {   
        $current_date_time = Carbon::now()->toDateTimeString();
        $status = 'In-progress';
        $app_ver_by=$request->app_ver_by;
        $data = requestform::find($id);
        $data->assign_to=$request->assign_to;
        $data->approved_by=$app_ver_by;
        $data->verified_by=$app_ver_by;
        $data->actions=$request->description;
        $data->approved_at=$current_date_time;
        $data->verified_at=$current_date_time;
        $data->status=$status;

        $data->save();

        return redirect()->back(); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
