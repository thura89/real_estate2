<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Region;
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
        $regions = Region::get(['name', 'id']);
        return view('backend.admin-user.index',compact('regions'));
    }
    public function ssd(Request $request)
    {
        $data = User::query()->whereIn('user_type',[1,2,3])
                            ->with([
                                'region',
                                'township'
                                ]);//Admin role= [1,2,3]    
        if ($request->get('keywords')) {
            $keywords = $request->get('keywords');
            $data->where(function($query) use ($keywords){
                $query->orWhere('company_name', 'LIKE' , '%'.$keywords.'%')
                        ->orWhere('name', 'LIKE' , '%'.$keywords.'%')
                        ->orWhere('email', 'LIKE' , '%'.$keywords.'%')
                        ->orWhere('phone', 'LIKE' , '%'.$keywords.'%');
            });
        }
        if ($request->get('region')) {
            $data->where('region', $request->get('region'));
        }
        if ($request->get('township')) {
            $data->where('township', $request->get('township'));
        }
        if ($request->get('user_type')) {
            $data->where('user_type', $request->get('user_type'));
        }
        return Datatables::of($data)
        
        ->editColumn('user_type',function($each){
            return config('const.role_level')[$each->user_type];
        })
        ->editColumn('region', function ($each) {
            $region = $each->region()->first('name');
            return $region->name ?? '-';
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
                       '<span class="badge badge-info">'.$browser.'</span>'.
                       '<span class="badge badge-info">'.$each->ip.'</span>';
            }
            return '-';
        })
        ->editColumn('login_at',function($each){
            return Carbon::parse($each->login_at)->diffForHumans();
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
        $regions = Region::get(['name', 'id']);
        return view('backend.admin-user.create',compact('regions'));
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
        $adminUser->region = $request->region;
        $adminUser->township = $request->township;
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
        $regions = Region::get(['name', 'id']);
        return view('backend.admin-user.edit',compact('adminUser','regions'));
    }

    public function profile(){
        $regions = Region::get(['name', 'id']);
        $adminUser = User::findOrFail(Auth()->user()->id);
        return view('backend.admin-user.edit',compact('adminUser','regions'));
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
        $adminUser->region = $request->region;
        $adminUser->township = $request->township;
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
