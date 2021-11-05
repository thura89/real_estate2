<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\AgentUser;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateAgentUserRequest;
use App\Http\Requests\UpdateAgentUserRequest;
use App\Http\Requests\CreateDeveloperUserRequest;
use App\Http\Requests\UpdateDeveloperUserRequest;

class DeveloperUserController extends Controller
{
    public function index()
    {
        return view('backend.developer-user.index');
    }
    public function ssd()
    {
        $data = User::query()->where('user_type',5);// 4 = Agent User    
        return Datatables::of($data)
        ->editColumn('profile_photo',function($each){
            return "<img src='$each->profile_photo' class='img-thumbnail' width='80'>" ?? '-';
        })
        ->editColumn('user_agent' ,function($each){
            if ($each->user_agent){
                $agent = new Agent();
                $agent->setUserAgent($each->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();

                return '<span class="badge badge-primary">'.$device.'</span></br>'.
                       '<span class="badge badge-success">'.$platform.'</span></br>'.
                       '<span class="badge badge-info">'.$browser.'</span>';
            }
            return '-';
        })
        ->editColumn('login_at',function($each){
            return Carbon::parse($each->login_at)->format('d-m-y H:i:s');
        })
        ->editColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
        })
        ->addColumn('action',function($each){
            $edit_icon = '<a href="'.route('admin.developer-user.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="" class="text-danger delete" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">' .$edit_icon.$delete_icon .'</div>';
        })
        ->rawColumns(['profile_photo','user_agent','action'])
        ->make(true);
        
    }
    public function create(){
        return view('backend.developer-user.create');
    }
    public function store(CreateDeveloperUserRequest $request){
        $developerUser = new User();
        if ($request->hasFile('profile_photo')) {
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
        }
        if ($request->hasFile('cover_photo')) {
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
        }
        $developerUser->user_type = config('const.Developer');
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->profile_photo = $profile_img_name;
        $developerUser->cover_photo = $cover_img_name;
        $developerUser->password = Hash::make($request->password);
        $developerUser->save();
        return redirect()->route('admin.developer-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $developerUser = User::findOrFail($id);
        return view('backend.developer-user.edit',compact('developerUser'));
    }
    public function update($id, UpdateDeveloperUserRequest $request){
        $developerUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$developerUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $developerUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$developerUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $developerUser->cover_photo = $cover_img_name;
        }
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->password = $request->password ? Hash::make($request->password) : $developerUser->password;
        $developerUser->update();
        return redirect()->route('admin.developer-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $developerUser = User::findOrFail($id);
        $developerUser->delete();
        return 'success';
    }
}
