<?php

namespace App\Http\Controllers\API;

use App\NewProject;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewProjectDetail;
use App\Http\Resources\NewProjectList;

class NewProjectController extends Controller
{

    public function new_project(Request $request){
        $data = NewProject::query()->with([
            'region',
            'township',
            'user'
        ])->orderBy('created_at','DESC')->paginate(10);
        $data = NewProjectList::collection($data)->additional(['result'=>true,'message'=>'Success']);
        if($data){
            return ResponseHelper::success('Success', $data);
        }else{
            return ResponseHelper::fail('fail', null);
        }

    }
    public function show(Request $request,$id){
        $data = NewProject::query()->with([
            'region',
            'township',
            'user'
        ])->find($id);
        $data = new NewProjectDetail($data);
        if($data){
            return ResponseHelper::success('Success', $data);
        }else{
            return ResponseHelper::fail('fail', null);
        }

    }
}
