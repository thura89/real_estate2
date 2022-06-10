<?php

namespace App\Http\Controllers\Backend;

use App\News;
use App\Region;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.news.index');
    }

    /**
     * Display a listing of the resource SSD.
     *
     * @return \Illuminate\Http\Response
     */
    public function ssd()
    {
        $data = News::query()->with([
            'user'
        ])->orderBy('updated_at','DESC');
        return Datatables::of($data)
            ->editColumn('category', function ($each) {
                return config('const.news_category')[$each->category] ?? '-';
            })
            ->editColumn('co_broke', function ($each) {
                return config('const.broker')[$each->co_broke] ?? '-';
            })
            ->editColumn('post_letter', function ($each) {
                return Str::words($each->post_letter, '6');
            })
            ->editColumn('post_by', function ($each) {
                if ($each->post_by) {
                    
                        return $each->user->name ? $each->user->name .' (Admin'.'-'.config('const.role_level')[$each->user->user_type].')' : 'Admin(-)';
                    
                }
            })
            ->editColumn('images', function ($each) {
                return '<img style="width: 100px;height:100px;" src="'. asset(config('const.news_img_path')) . '/' . $each->images . '">' ?? '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.news.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['images', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new News();
        $data->post_by = Auth()->user()->id;
        $data->post_title = $request->post_title;
        $data->category = $request->category;

        if ($request->hasFile('images')) {
            $profile_img = $request->file('images');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/news/'.$profile_img_name, file_get_contents($profile_img));
        }
        $data->images = $profile_img_name;
        $data->post_letter = $request->post_letter;

        $data->save();

        return redirect()->route('admin.news.index')->with('create', 'Successfully Created');
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
        $data = News::findOrFail($id);
        return view('backend.news.edit', compact('data'));
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
        $data = News::findOrFail($id);
        $data->post_by = Auth()->user()->id;
        $data->post_title = $request->post_title;
        $data->category = $request->category;

        $profile_img_name = $data->images;
        if ($request->images) {
            if ($request->hasFile('images')) {
                Storage::disk('public')->delete('/news/'.$data->images);
    
                $profile_img = $request->file('images');
                $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
                Storage::disk('public')->put('/news/'.$profile_img_name, file_get_contents($profile_img));
            }
        }
        $data->images = $profile_img_name;
        $data->post_letter = $request->post_letter;
        $data->update();
        return redirect()->route('admin.news.index')->with('update', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::findOrFail($id);
        Storage::disk('public')->delete('/news/'.$data->images);
        $data->delete();
    }
}
