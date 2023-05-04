<?php

namespace App\Http\Controllers\Backend;

use App\Region;
use Carbon\Carbon;
use App\NewProject;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            ->editColumn('images', function ($each) {
                $image = json_decode($each['images']);
                if ($image) {
                    return '<img style="width: 100px;height:100px;" src="' . asset(config('const.new_project_img_path')) . '/' . $image[0] . '">' ?? '-';
                }
                return '-';
            })
            ->editColumn('region', function ($each) {
                $region = $each->region()->first('name');
                return $region->name ?? '-';
            })
            ->editColumn('township', function ($each) {
                $township = $each->township()->first('name');
                return $township->name ?? '-';
            })

            ->editColumn('status', function ($each) {
                // return $each->status;
                if ($each->status == config('const.pending') && $each->status != null) {
                    return '<span class="badge badge-pill badge-danger">Expired</span>' ?? '-';
                } else {
                    return '<span class="badge badge-pill badge-success">Active</span>' ?? '-';
                }
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                if ($each->status == config('const.pending') && $each->status != null) {
                    $renew = '<a href="" data-id="' . $each->id . '" class="expired badge badge-pill badge-info text-white" title="Renew">renew</a>';
                } else {
                    $renew = '';
                }
                $edit_icon = '<a href="' . route('admin.new_project.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $renew . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['images', 'budget', 'action', 'status'])
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
        $data->user_id = Auth()->user()->id;
        $data->title = $request->title;
        /* Address */
        $data->region = $request->region;
        $data->township = $request->township;
        /* Description */
        $data->about_project = $request->about_project;

        /* Project Image */
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/new_project/' . $file_name, file_get_contents($image));
                $images[] = $file_name;
            }
        }
        $data->images = json_encode($images);
        $data->save();

        return redirect('admin/new_project')->with('create', 'Successfully Created');
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
        $decode_images = json_decode($data['images']) ?? [];
        $images = [];
        foreach ($decode_images as $key => $image) {
            $images[] = [
                'id' => $image,
                'src' => asset(config('const.new_project_img_path')) . '/' . $image
            ];
        }
        $images = json_encode($images);
        return view('backend.new_project.edit', compact('id', 'regions', 'data', 'images'));
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

        $data->title = $request->title ?? $data->title;
        /* Address */
        $data->region = $request->region ?? $data->region;
        $data->township = $request->township ?? $data->township;

        /* Description */
        $data->about_project = $request->about_project;
        /* Photo */

        /* Splice if not image  */
        if ($request->old || $request->photos) {
            $old_data = $request->old ?? [];

            $count = count($request->file('photos') ?? []);
            $reverse_data = array_reverse($old_data);
            $splice_data = array_splice($reverse_data, $count);

            /* Fetch Old Image */
            $store_data = json_decode($data->images);

            /* Diff image */
            $collection = collect($store_data);
            $diff_image = $collection->diff($splice_data);

            /* Delete image */
            if (!$diff_image->all() == []) {
                foreach ($diff_image as $key => $diff) {
                    Storage::disk('public')->delete('/new_project/' . $diff);
                }
            }

            /* Get Remain Data from coming form */
            foreach ($splice_data as $image) {
                $datas[] = $image;
            }

            /* Upload New image */
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('new_project/' . $file_name, file_get_contents($image));
                    $datas[] = $file_name;
                }
            }
            $data->images = json_encode($datas);
        }



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
        $img = json_decode($data->images);
        if ($img) {
            foreach ($img as $key => $diff) {
                Storage::disk('public')->delete('new_project/' . $diff);
            }
        }
        $data->delete();
    }
    public function expired($id)
    {
        $data = NewProject::findOrFail($id);
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->status = config('const.publish'); //Renew status == 1
        $data->update();
        return redirect()->route('admin.new_project.index')->with('Renew', 'Successfully Extended');
    }
}
