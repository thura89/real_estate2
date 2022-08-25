<?php

namespace App\Http\Controllers\API;

use App\Region;
use App\WantToBuyRent;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\Want2BuyRentListsResource;
use App\Http\Resources\API\Want2BuyRentDetailsResource;

class Want2BuyRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = WantToBuyRent::query()->with([
            'region',
            'township',
        ])->where('user_id', auth()->user()->id);

        if($request->keywords){
            $keyword = $request->keywords;
            $data->whereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            })->orWhereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }
        if ($request->type) {
            $data->where('properties_type',$request->type);
        }
        if ($request->category) {
            $data->where('properties_category',$request->category);
        }

        $data =  $data->orderBy('created_at','DESC')->paginate(10);

        return Want2BuyRentListsResource::collection($data)->additional(['result'=>true,'message'=>'Success']);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.agent.want2buyrent.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            /* Info */
            'properties_category' => 'required',
            'properties_type' => 'required',
            'title' => 'required',
            'phone_no' => 'required',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_unit' => 'required',
            'area_width' => 'required',
            'area_length' => 'required',
            'completion' => 'required',
            'floor_level' => 'required_if:properties_category,==,3',
            'furnished_status' => 'required_if:properties_category,==,3',

            /* Budget Price */
            'budget_from' => 'required',
            'budget_to' => 'required',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Broker */
            'co_broke' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::fail('Fail Request', $validator->errors());
        }

        $data = new WantToBuyRent();
        $data->user_id = Auth()->user()->id;
        $data->title = $request->title;
        $data->budget_from = $request->budget_from;
        $data->budget_to = $request->budget_to;
        $data->currency_code = $request->currency_code;
        $data->area_unit = $request->area_unit;
        $data->area_width = $request->area_width;
        $data->area_length = $request->area_length;
        $data->floor_level = $request->floor_level;
        $data->completion = $request->completion;
        $data->furnished_status = $request->furnished_status;
        $data->phone_no = $request->phone_no;
        $data->region = $request->region;
        $data->township = $request->township;
        $data->properties_type = $request->properties_type;
        $data->properties_category = $request->properties_category;
        $data->descriptions = $request->descriptions;
        $data->co_broke = $request->co_broke;
        $data->terms_condition = $request->terms_condition ? 1 : 0;
        $data->status = $request->status ?? 1;
        $data->save();

        return ResponseHelper::success('Successfully Created',Null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = WantToBuyRent::with('user')->findOrFail($id);
        $data = new Want2BuyRentDetailsResource($data);
        return ResponseHelper::success('success',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Get Region */
        $regions = Region::get(['name', 'id']);
        $data = WantToBuyRent::findOrFail($id);
        return view('backend.agent.want2buyrent.edit', compact('id', 'regions', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            /* Info */
            'properties_category' => 'required',
            'properties_type' => 'required',
            'title' => 'required',
            'phone_no' => 'required',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_unit' => 'required',
            'area_width' => 'required',
            'area_length' => 'required',
            'completion' => 'required',
            'floor_level' => 'required_if:properties_category,==,3',
            'furnished_status' => 'required_if:properties_category,==,3',

            /* Budget Price */
            'budget_from' => 'required',
            'budget_to' => 'required',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Broker */
            'co_broke' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::fail('Fail Request', $validator->errors());
        }

        $data = WantToBuyRent::findOrFail($id);
        $data->user_id = Auth()->user()->id;
        $data->title = $request->title;
        $data->budget_from = $request->budget_from;
        $data->budget_to = $request->budget_to;
        $data->currency_code = $request->currency_code;
        $data->area_unit = $request->area_unit;
        $data->area_width = $request->area_width;
        $data->area_length = $request->area_length;
        $data->floor_level = $request->floor_level;
        $data->completion = $request->completion;
        $data->furnished_status = $request->furnished_status;
        $data->phone_no = $request->phone_no;
        $data->region = $request->region ?? $data->region;
        $data->township = $request->township ?? $data->township;
        $data->properties_type = $request->properties_type ?? $data->properties_type;
        $data->properties_category = $request->properties_category ?? $data->properties_category;
        $data->descriptions = $request->descriptions;
        $data->co_broke = $request->co_broke ? 1 : 0;
        $data->terms_condition = $request->terms_condition;
        $data->status = $request->status ?? 1;
        $data->update();

        return ResponseHelper::success('Successfully Updated',Null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WantToBuyRent::findOrFail($id);
        $data->delete();
        return ResponseHelper::success('Successfully Deleted',Null);
    }
}
