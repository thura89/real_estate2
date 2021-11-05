<?php

namespace App\Http\Controllers\Backend;

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
        return view('backend.want2buyrent.index', compact('regions'));
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
            'user',
        ]);
        return Datatables::of($data)
            ->filterColumn('region', function ($query, $keyword) {
                $query->whereHas('address', function ($qa) use ($keyword) {
                    $qa->whereHas('region', function ($qr) use ($keyword) {
                        $qr->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                });
            })
            ->filterColumn('township', function ($query, $keyword) {
                $query->whereHas('address', function ($qa) use ($keyword) {
                    $qa->whereHas('township', function ($qt) use ($keyword) {
                        $qt->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                });
            })
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
            ->editColumn('post_by', function ($each) {
                if ($each->user_id) {
                    // return $each->user['name'];
                    if($each->user['user_type'] == 1 || $each->user['user_type'] == 2 || $each->user['user_type'] == 3){
                        return $each->user['name'] .' (Admin)' ?? 'Admin(-)';    
                    }
                    if($each->user['user_type'] == 4){
                        return $each->user['name'] .' (Agent)'?? 'Agent(-)';    
                    }
                    if($each->user['user_type'] == 5){
                        return $each->user['name'] .' (Dev)'?? 'Developer(-)';    
                    }
                    if($each->user['user_type'] == 6){
                        return $each->user['name'] .' (User)'?? 'User(-)';    
                    }
                    return '-';
                }
                return '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.want2buyrent.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['budget', 'action'])
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
        return view('backend.want2buyrent.create', compact('regions'));
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
        $data->status = $request->status ?? 1;
        $data->save();

        return redirect()->route('admin.want2buyrent.index')->with('create', 'Successfully Created');
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
        return view('backend.want2buyrent.edit', compact('id', 'regions', 'data'));
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
        $data->status = $request->status ?? 1;
        $data->update();
        return redirect()->route('admin.want2buyrent.index')->with('update', 'Successfully Updated');
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
}
