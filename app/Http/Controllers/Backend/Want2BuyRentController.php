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
        ])->orderBy('created_at', 'DESC');
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
                return '<div class="budget">' . $each->budget_from . '-' . $each->budget_to  . ' ' .  $each->currency_code . '</div>';
            })
            ->editColumn('properties_type', function ($each) {
                return config('const.property_type')[$each->properties_type] ?? '-';
            })
            ->editColumn('properties_category', function ($each) {
                return config('const.property_category')[$each->properties_category] ?? '-';
            })
            ->editColumn('status', function ($each) {
                if ($each->status == config('const.pending')) {
                    return '<span class="badge badge-pill badge-danger">Expired</span>' ?? '-';
                }
                if ($each->status == config('const.publish')) {
                    return '<span class="badge badge-pill badge-success">Active</span>' ?? '-';
                }
            })
            ->editColumn('post_by', function ($each) {
                if ($each->user_id) {
                    if ($each->user['user_type'] == 1 || $each->user['user_type'] == 2 || $each->user['user_type'] == 3) {
                        return $each->user['name'] . ' (Admin)' ?? 'Admin(-)';
                    }
                    if ($each->user['user_type'] == 4) {
                        return $each->user['name'] . ' (Agent)' ?? 'Agent(-)';
                    }
                    if ($each->user['user_type'] == 5) {
                        return $each->user['name'] . ' (Dev)' ?? 'Developer(-)';
                    }
                    if ($each->user['user_type'] == 6) {
                        return $each->user['name'] . ' (User)' ?? 'User(-)';
                    }
                    return '-';
                }
                return '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y');
            })
            ->addColumn('action', function ($each) {
                if ($each->status == config('const.pending')) {
                    $renew = '<a href="" data-id="' . $each->id . '" class="expired badge badge-pill badge-info text-white" data-toggle="tooltip" data-placement="top" title="Renew">renew</a>';
                } else {
                    $renew = '';
                }
                $edit_icon = '<a href="' . route('admin.want2buyrent.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
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
        $data->bed_room = $request->bed_room ?? null;
        $data->bath_room = $request->bath_room ?? null;
        $data->furnished_status = $request->repairing ?? null;
        $data->situations = $request->situations ?? null;
        $data->budget_from = $request->budget_from ?? null;
        $data->budget_to = $request->budget_to ?? null;
        $data->currency_code = $request->currency_code ?? null;
        $data->descriptions = $request->descriptions ?? null;
        $data->terms_condition = $request->terms_condition ? 1 : 0;
        $data->status = config('const.publish');
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
        $data->properties_type = $request->properties_type ?? $data->properties_type;
        $data->properties_category = $request->properties_category ?? $data->properties_category;
        $data->title = $request->title ?? $data->title;
        $data->phone_no = $request->phone_no ?? $data->phone_no;
        $data->region = $request->region ?? $data->region;
        $data->township = $request->township ?? $data->township;
        $data->area_option = $request->area_option ?? $data->area_option;
        $data->area_unit = $request->area_unit ?? $data->area_unit;
        $data->area_width = $request->area_width ?? $data->area_width;
        $data->area_length = $request->area_length ?? $data->area_length;
        $data->area_size = $request->area_size ?? $data->area_size;
        $data->floor_level = $request->floor_level ?? $data->floor_level;
        $data->bed_room = $request->bed_room ?? $data->bed_room;
        $data->bath_room = $request->bath_room ?? $data->bath_room;
        $data->floor_level = $request->floor_level ?? $data->floor_level;
        $data->furnished_status = $request->repairing ?? $data->furnished_status;
        $data->situations = $request->situations ?? $data->situations;
        $data->budget_from = $request->budget_from ?? $data->budget_from;
        $data->budget_to = $request->budget_to ?? $data->budget_to;
        $data->currency_code = $request->currency_code ?? $data->currency_code;
        $data->descriptions = $request->descriptions ?? $data->descriptions;
        $data->terms_condition = 1;

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

    public function expired($id)
    {
        $data = WantToBuyRent::findOrFail($id);
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->status = config('const.publish'); //Renew status == 1
        $data->update();
        return redirect()->route('admin.want2buyrent.index')->with('Renew', 'Successfully Extended');
    }
}
