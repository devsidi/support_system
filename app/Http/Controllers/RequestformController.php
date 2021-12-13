<?php

namespace App\Http\Controllers;

use App\Models\requestform;
use App\Models\servicetype;
use App\Models\department;
use Illuminate\Http\Request; 

class RequestformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $servicetype = Servicetype::all();
        $department = department::all();
        return view('request',compact('servicetype','department'));
        // return Servicetype::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $status = 'NEW';
        $case_id = substr(str_shuffle("0123456789"), 0, 8); //case id random number
        requestform::create([
            'user_id'=>auth()->user()->id,//$request->name, then tmbah other req from form 
            'name'=>auth()->user()->name,
            'service_type'=>$request->service,
            'remarks'=>$request->description,
            'department'=>$request->department,
            'status'=>$status,
            'case_id'=>$case_id,
        ]); 
        return redirect()->back()->with('msg','Ticket has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\requestform  $requestform
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {    
        $submittedrequest =requestform::where('user_id',auth()->user()->id)->orderBy('id', 'ASC')->get(); 
        return view('submittedrequest',compact('submittedrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\requestform  $requestform
     * @return \Illuminate\Http\Response
     */
    public function edit(requestform $requestform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\requestform  $requestform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, requestform $requestform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\requestform  $requestform
     * @return \Illuminate\Http\Response
     */
    public function destroy(requestform $requestform)
    {
        //
    }
}
