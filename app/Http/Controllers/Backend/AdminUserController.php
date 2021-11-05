<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\AdminUser;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateAdminUserRequest;
use App\Http\Requests\UpdateAdminUserRequest;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('backend.admin-user.index');
    }
    public function ssd()
    {
    
        $data = User::query()->whereIn('user_type',[1,2,3]);//Admin role= [1,2,3]    
        return Datatables::of($data)
        
        ->editColumn('user_type',function($each){
            return config('const.role_level')[$each->user_type];
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
            $edit_icon = '<a href="'.route('admin.admin-user.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="" class="text-danger delete" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">' .$edit_icon.$delete_icon .'</div>';
        })
        ->rawColumns(['user_agent','action'])
        ->make(true);
        
    }
    public function create(){
        return view('backend.admin-user.create');
    }
    public function store(CreateAdminUserRequest $request){
        $adminUser = new User();
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
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->description = $request->description;
        $adminUser->address = $request->address;
        $adminUser->user_type = $request->user_type;
        $adminUser->profile_photo = $profile_img_name;
        $adminUser->cover_photo = $cover_img_name;
        $adminUser->password = Hash::make($request->password);
        $adminUser->save();
        return redirect()->route('admin.admin-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $adminUser = User::findOrFail($id);
        return view('backend.admin-user.edit',compact('adminUser'));
    }

    public function profile(){
        $adminUser = User::findOrFail(Auth()->user()->id);
        return view('backend.admin-user.edit',compact('adminUser'));
    }

    public function update($id, UpdateAdminUserRequest $request){
        // return $request->all();
        $adminUser = User::findOrFail($id);

        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$adminUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $adminUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$adminUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $adminUser->cover_photo = $cover_img_name;
        }
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->description = $request->description;
        $adminUser->address = $request->address;
        $adminUser->user_type = $request->user_type;
        $adminUser->password = $request->password ? Hash::make($request->password) : $adminUser->password;
        $adminUser->update();

        return redirect()->route('admin.admin-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $adminUser = User::findOrFail($id);
        $adminUser->delete();
        return 'success';
    }
}
