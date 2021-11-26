<?php

namespace App\Http\Controllers\API;
use Carbon\Carbon;
use App\NewProject;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewProjectList;
use App\Http\Resources\NewProjectDetail;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\UserNewProjectResource;

class UserNewProjectController extends Controller
{
    public function index(Request $request){
        $data = NewProject::query()->with([
            'region',
            'township',
        ])->where('user_id',auth()->user()->id);
        
        $data = $data->orderBy('created_at','DESC')->paginate(10);
        $data = NewProjectList::collection($data)->additional(['result'=>true,'message'=>'Success']);

        if($data){
            return $data;
        }else{
            return ResponseHelper::fail('fail', null);
        }

    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'region' => 'required',
            'township' => 'required',
            'wards' => 'required',
            'street_name' => 'required',
            'townsandvillages' => 'required',
            'type_of_street' => 'required',

            /* Price */
            'area_unit' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'currency_code' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required',

            /* Situation */
            'new_project_sale_type' => 'required',
            'preparation' => 'required',
            'project_start_at' => 'required',
            'project_end_at' => 'required',

            /* Description */
            'about_project' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }
        
        $data = new NewProject();
        $data->user_id = Auth()->user()->id;

        /* Address */
        $data->region = $request->region;
        $data->township = $request->township;
        $data->wards = $request->wards;
        $data->townsandvillages = $request->townsandvillages;
        $data->street_name = $request->street_name;
        $data->type_of_street = $request->type_of_street;

        /* Price */
        $data->area_unit = $request->area_unit;
        $data->min_price = $request->min_price;
        $data->max_price = $request->max_price;
        $data->currency_code = $request->currency_code;

        /* Payment */
        $data->purchase_type = $request->purchase_type;
        $data->installment = ($request->installment == 'on') ? 1 : 0 ;

        /* Situation */
        $data->new_project_sale_type = $request->new_project_sale_type;
        $data->preparation = $request->preparation;
        $data->project_start_at = Carbon::createFromDate($request->project_start_at);
        $data->project_end_at = Carbon::createFromDate($request->project_end_at);

        /* Description */
        $data->about_project = $request->about_project;

        /* Facility */
        $data->elevator = $request->elevator ? 1 : 0;
        $data->garage = $request->garage ? 1 : 0;
        $data->fitness_center = $request->fitness_center ? 1 : 0;
        $data->security = $request->security ? 1 : 0;
        $data->swimming_pool = $request->swimming_pool ? 1 : 0;
        $data->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
        $data->playground = $request->playground ? 1 : 0;
        $data->garden = $request->garden ? 1 : 0;
        $data->carpark = $request->carpark ? 1 : 0;
        $data->own_transformer = $request->own_transformer ? 1 : 0;
        $data->disposal = $request->disposal ? 1 : 0;
        
        $data->save();

        return ResponseHelper::success('Successfully Created',Null);
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'region' => 'required',
            'township' => 'required',
            'wards' => 'required',
            'street_name' => 'required',
            'townsandvillages' => 'required',
            'type_of_street' => 'required',

            /* Price */
            'area_unit' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'currency_code' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required',

            /* Situation */
            'new_project_sale_type' => 'required',
            'preparation' => 'required',
            'project_start_at' => 'required',
            'project_end_at' => 'required',

            /* Description */
            'about_project' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }

        $data = NewProject::findOrFail($id);
        $data->user_id = Auth()->user()->id;

        /* Address */
        $data->region = $request->region ?? $data->region;
        $data->township = $request->township ?? $data->township;
        $data->wards = $request->wards;
        $data->townsandvillages = $request->townsandvillages;
        $data->street_name = $request->street_name;
        $data->type_of_street = $request->type_of_street;

        /* Price */
        $data->area_unit = $request->area_unit;
        $data->min_price = $request->min_price;
        $data->max_price = $request->max_price;
        $data->currency_code = $request->currency_code;

        /* Payment */
        $data->purchase_type = $request->purchase_type;
        $data->installment = ($request->installment == 'on') ? 1 : 0 ;

        /* Situation */
        $data->new_project_sale_type = $request->new_project_sale_type;
        $data->preparation = $request->preparation;
        $data->project_start_at = Carbon::createFromDate($request->project_start_at);
        $data->project_end_at = Carbon::createFromDate($request->project_end_at);

        /* Description */
        $data->about_project = $request->about_project;

        /* Facility */
        $data->elevator = $request->elevator ? 1 : 0;
        $data->garage = $request->garage ? 1 : 0;
        $data->fitness_center = $request->fitness_center ? 1 : 0;
        $data->security = $request->security ? 1 : 0;
        $data->swimming_pool = $request->swimming_pool ? 1 : 0;
        $data->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
        $data->playground = $request->playground ? 1 : 0;
        $data->garden = $request->garden ? 1 : 0;
        $data->carpark = $request->carpark ? 1 : 0;
        $data->own_transformer = $request->own_transformer ? 1 : 0;
        $data->disposal = $request->disposal ? 1 : 0;

        $data->update();

        return ResponseHelper::success('Successfully Updated',Null);
    }

    public function show(Request $request,$id){
        $data = NewProject::query()->with([
            'region',
            'township',
            'user'
        ])->where('user_id',auth()->user()->id)->find($id);
        $data = new UserNewProjectResource($data);
        if($data){
            return ResponseHelper::success('Success', $data);
        }else{
            return ResponseHelper::fail('fail', null);
        }

    }

    public function destroy(Request $request,$id)
    {
        $data = NewProject::findOrFail($id);
        $data->delete();
        return ResponseHelper::success('Successfully Delete',Null);
    }
}
