<?php

namespace App\Http\Controllers\Backend;

use App\News;
use App\Region;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.slider.index');
    }

    /**
     * Display a listing of the resource SSD.
     *
     * @return \Illuminate\Http\Response
     */
    public function ssd()
    {
        $data = Slider::query();
        return Datatables::of($data)
            ->editColumn('title', function ($each) {
                return $each->title;
            })
            ->editColumn('images', function ($each) {
                return '<img style="width: 150px;height:100px;" src="'. asset(config('const.sliders_img_path')) . '/' . $each->images . '">' ?? '-';
            })
            ->addColumn('status', function ($each) {
                if ($each->status == 1) {
                    return '<span class="badge badge-pill badge-success">' . config('const.slider_status')[$each->status] . '</span>' ?? '-';
                }
                return '<span class="badge badge-pill badge-warning">' . config('const.slider_status')[$each->status] . '</span>' ?? '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.slider.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['title','status','images', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data = new Slider();
        $data->title = $request->title;
        if ($request->hasFile('images')) {
            $profile_img = $request->file('images');
            $slider_img = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/slider/'.$slider_img, file_get_contents($profile_img));
        }
        $data->images = $slider_img;
        $data->status = ($request->status == 'on') ? 1 : 0 ;

        $data->save();

        return redirect()->route('admin.slider.index')->with('create', 'Successfully Created');
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
        $data = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('data'));
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
        $data = Slider::findOrFail($id);
        $data->title = $request->title;

        $slider_img_title = $data->images;
        if ($request->images) {
            if ($request->hasFile('images')) {
                Storage::disk('public')->delete('/slider/'.$data->images);
    
                $slider_img = $request->file('images');
                $slider_img_title = uniqid().'_'.time().'.'.$slider_img->extension();
                Storage::disk('public')->put('/slider/'.$slider_img_title, file_get_contents($slider_img));
            }
        }
        $data->images = $slider_img_title;
        if($request->status){
            $data->status = ($request->status == 'on') ? 1 : 0 ;
        }
        $data->update();
        return redirect()->route('admin.slider.index')->with('update', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Slider::findOrFail($id);
        Storage::disk('public')->delete('/slider/'.$data->images);
        $data->delete();
    }
}
