<?php

namespace App\Http\Controllers\Backend\Developer;

use App\Region;
use Carbon\Carbon;
use App\WantToBuyRent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Want2BuyRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.developer.want2buyrent.index', compact('regions'));
    }

    /**
     * Display a listing of the resource SSD.
     *
     * @return \Illuminate\Http\Response
     */
    public function ssd()
    {
        $data = WantToBuyRent::query()->with([
            'region',
            'township',
        ])->where('user_id', auth()->user()->id);
        return Datatables::of($data)
            ->editColumn('region', function ($each) {
                $region = $each->region()->first('name');
                return $region->name ?? '-';
            })
            ->editColumn('township', function ($each) {
                $township = $each->township()->first('name');
                return $township->name ?? '-';
            })
            ->editColumn('budget', function ($each) {
                return '<div class="budget">' . $each->budget_from . '~' . $each->budget_to  . '</div>';
            })
            ->editColumn('properties_type', function ($each) {
                return config('const.property_type')[$each->properties_type] ?? '-';
            })
            ->editColumn('properties_category', function ($each) {
                return config('const.property_category')[$each->properties_category] ?? '-';
            })
            ->editColumn('co_broke', function ($each) {
                return config('const.broker')[$each->co_broke] ?? '-';
            })
            ->editColumn('status', function ($each) {
                if ($each->status == config('const.pending')) {
                    return '<span class="badge badge-pill badge-danger">Expired</span>' ?? '-';
                }
                if ($each->status == config('const.publish')) {
                    return '<span class="badge badge-pill badge-success">Active</span>' ?? '-';
                }
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                if ($each->status == config('const.pending')) {
                    $renew = '<a href="" data-id="' . $each->id . '" class="expired badge badge-pill badge-info text-white" data-toggle="tooltip" data-placement="top" title="Renew">renew</a>';
                } else {
                    $renew = '';
                }
                $edit_icon = '<a href="' . route('developer.want2buyrent.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $renew . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['budget', 'action', 'status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.developer.want2buyrent.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $data->status = config('const.publish');
        $data->save();

        return redirect()->route('developer.want2buyrent.index')->with('create', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('backend.developer.want2buyrent.edit', compact('id', 'regions', 'data'));
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
        // $data->status = $request->status ?? 1;
        $data->update();
        return redirect()->route('developer.want2buyrent.index')->with('update', 'Successfully Updated');
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
    }
    public function expired($id)
    {
        $data = WantToBuyRent::where('user_id', Auth::user()->id)->findOrFail($id);
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->status = config('const.publish'); //Renew status == 1
        $data->update();
        return redirect()->route('developer.want2buyrent.index')->with('Renew', 'Successfully Extended');
    }
}
