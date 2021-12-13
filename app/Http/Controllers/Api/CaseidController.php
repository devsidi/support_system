<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\requestform;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class CaseidController extends Controller
{
	public function index(Request $request){
        $messages = [
                        'case_id.required' => 'Case ID is Required.'
                    ];

        $validation = [
                        'case_id' => 'required|integer'
                      ];

        $request->validate($validation, $messages);

        $data = requestform::select('requestforms.*')
                ->where('requestforms.case_id',$request->case_id)->first();

        if($data == null){
            return response()->json([
                'status'  => 'failed',
                'message' => 'No data case found!'
            ]);
        }

        $case['case_id'] = $data->case_id;
        $case['name'] = $data->name;
        $case['department'] = $data->department;
        $case['service_type'] = $data->service_type;
        $case['remarks'] = $data->remarks;
        $case['status'] = $data->status;
        $case['assign_to'] = $data->assign_to;
        $case['approved_by'] = $data->approved_by;
        $case['verified_by'] = $data->verified_by;
        $case['date_registered'] = $data->date_registered;
        $case['actions'] = $data->actions;

        return response()->json([ 
            'status' => 'success',
            'data' => $case,
        ]);
    }
}