<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = department::all();
        return view('department',compact('department'));
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
        department::create([  
            'name'=>$request->department,
            'status'=>$status, 
        ]); 
        return redirect()->back()->with('msg','Department has been added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function editdepartment($id)
    {
        $department=department::find($id);
        return view ('editdepartment', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $data = department::find($id);
        $data->name=$request->department;
        $data->status=$request->status;

        $data->save();

        return redirect()->back(); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = department::find($id);
        $data->delete();

        return redirect()->back()->with('del','Department has been deleted!!');

    } 
}
