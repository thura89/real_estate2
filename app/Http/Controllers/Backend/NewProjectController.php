<?php

namespace App\Http\Controllers\Backend;

use App\Region;
use Carbon\Carbon;
use App\WantToBuyRent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\NewProject;
use Illuminate\Support\Facades\Auth;

class NewProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.new_project.index', compact('regions'));
    }

    /**
     * Display a listing of the resource SSD.
     *
     * @return \Illuminate\Http\Response
     */
    public function ssd()
    {
        $data = NewProject::query()->with([
            'region',
            'township',
        ])->latest('updated_at');
        return Datatables::of($data)
            ->editColumn('region', function ($each) {
                $region = $each->region()->first('name');
                return $region->name ?? '-';
            })
            ->editColumn('township', function ($each) {
                $township = $each->township()->first('name');
                return $township->name ?? '-';
            })
            ->editColumn('new_project_sale_type', function ($each) {
                return config('const.developer_sale_type')[$each->new_project_sale_type] ?? '-';
            })
            ->editColumn('price', function ($each) {
                return $each->min_price .'~'. $each->max_price .' '. config('const.currency_code')[$each->currency_code] ?? '-';
            })

            ->editColumn('start_at', function ($each) {
                return Carbon::parse($each->project_start_at)->format('Y') ?? '-';
            })

            ->editColumn('end_at', function ($each) {
                return Carbon::parse($each->project_end_at)->format('Y') ?? '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.new_project.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.new_project.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new NewProject();
        $data->developer_id = Auth()->user()->id;

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

        return redirect()->route('developer.new_project.index')->with('create', 'Successfully Created');
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
        $data = NewProject::findOrFail($id);
        return view('backend.new_project.edit', compact('id', 'regions', 'data'));
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
        $data = NewProject::findOrFail($id);

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
        return redirect()->route('admin.new_project.index')->with('update', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NewProject::findOrFail($id);
        $data->delete();
    }
}