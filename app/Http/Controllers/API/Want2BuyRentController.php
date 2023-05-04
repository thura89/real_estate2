<?php

namespace App\Http\Controllers\API;

use App\Region;
use Carbon\Carbon;
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

        if ($request->keywords) {
            $keyword = $request->keywords;
            $data->whereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            })->orWhereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }
        if ($request->type) {
            $data->where('properties_type', $request->type);
        }
        if ($request->category) {
            $data->where('properties_category', $request->category);
        }

        $data =  $data->orderBy('created_at', 'DESC')->paginate(10);

        return Want2BuyRentListsResource::collection($data)->additional(['result' => true, 'message' => 'Success']);
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
        $validator = Validator::make($request->all(), [
            /* Info */
            'properties_category' => 'required',
            'properties_type' => 'required',
            'title' => 'required',
            'phone_no' => 'required|digits_between:9,11',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required|numeric',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',
            'area_width' => 'required_if:area_option,==,1',
            'area_length' => 'required_if:area_option,==,1',

            'floor_level' => 'required_if:properties_category,3,4,6,8',

            'repairing' => 'required',
            'situations' => 'required',

            /* Budget Price */
            'budget_from' => 'required|numeric',
            'budget_to' => 'required|numeric',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::fail('Fail Request', $validator->errors());
        }

        $data = new WantToBuyRent();
        $data->user_id = Auth()->user()->id;
        $data->properties_type = $request->properties_type ?? null;
        $data->properties_category = $request->properties_category ?? null;
        $data->title = $request->title ?? null;
        $data->phone_no = $request->phone_no ?? null;

        $data->region = $request->region ?? null;
        $data->township = $request->township ?? null;

        $data->area_option = $request->area_option ?? null;
        $data->area_unit = $request->area_unit ?? null;
        $data->area_width = $request->area_width ?? null;
        $data->area_length = $request->area_length ?? null;
        $data->area_size = $request->area_size ?? null;
        $data->floor_level = $request->floor_level ?? null;

        $data->furnished_status = $request->repairing ?? null;
        $data->situations = $request->situations ?? null;

        $data->budget_from = $request->budget_from ?? null;
        $data->budget_to = $request->budget_to ?? null;
        $data->currency_code = $request->currency_code ?? null;

        $data->bed_room = $request->bed_room ?? null;
        $data->bath_room = $request->bath_room ?? null;

        $data->descriptions = $request->descriptions ?? null;
        $data->terms_condition = $request->terms_condition ? 1 : 0;
        $data->status = config('const.publish');

        $data->save();

        return ResponseHelper::success('Successfully Created', Null);
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
        return ResponseHelper::success('success', $data);
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            /* Info */
            'properties_category' => 'required',
            'properties_type' => 'required',
            'title' => 'required',
            'phone_no' => 'required|digits_between:9,11',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required|numeric',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',
            'area_width' => 'required_if:area_option,==,1',
            'area_length' => 'required_if:area_option,==,1',

            'floor_level' => 'required_if:properties_category,3,4,6,8',

            'repairing' => 'required',
            'situations' => 'required',

            /* Budget Price */
            'budget_from' => 'required|numeric',
            'budget_to' => 'required|numeric',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::fail('Fail Request', $validator->errors());
        }

        $data = WantToBuyRent::where('user_id', Auth::user()->id)->findOrFail($request->id);
        $data->properties_type = $request->properties_type ?? null;
        $data->properties_category = $request->properties_category ?? null;
        $data->title = $request->title ?? null;
        $data->phone_no = $request->phone_no ?? null;

        $data->region = $request->region ?? null;
        $data->township = $request->township ?? null;

        $data->area_option = $request->area_option ?? null;
        $data->area_unit = $request->area_unit ?? null;
        $data->area_width = $request->area_width ?? null;
        $data->area_length = $request->area_length ?? null;
        $data->area_size = $request->area_size ?? null;
        $data->floor_level = $request->floor_level ?? null;

        $data->furnished_status = $request->repairing ?? null;
        $data->situations = $request->situations ?? null;

        $data->budget_from = $request->budget_from ?? null;
        $data->budget_to = $request->budget_to ?? null;
        $data->currency_code = $request->currency_code ?? null;

        $data->bed_room = $request->bed_room ?? null;
        $data->bath_room = $request->bath_room ?? null;

        $data->descriptions = $request->descriptions ?? null;
        $data->terms_condition = $request->terms_condition ? 1 : 0;
        $data->status = config('const.publish');

        $data->update();

        return ResponseHelper::success('Successfully Updated', Null);
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
        return ResponseHelper::success('Successfully Deleted', Null);
    }
    public function expired($id)
    {
        $data = WantToBuyRent::where('user_id', Auth()->id)->findOrFail($id);
        $data->created_at = Carbon::now();
        $data->update_at = Carbon::now();
        $data->status = config('const.publish'); //Renew status == 1
        $data->update();
        return ResponseHelper::success('Success', 'Successfully Renew');
    }
}
