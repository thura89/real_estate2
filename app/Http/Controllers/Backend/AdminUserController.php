<?php

namespace App\Http\Controllers\Backend;

use App\AdminUser;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    
        $data = AdminUser::query();    
        return Datatables::of($data)
        ->editColumn('role_id',function($each){
            return config('const.role_level')[$each->role_id];
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
        $adminUser = new AdminUser();
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->role_id = $request->role_id;
        $adminUser->password = Hash::make($request->password);
        $adminUser->save();
        return redirect()->route('admin.admin-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $adminUser = AdminUser::findOrFail($id);
        return view('backend.admin-user.edit',compact('adminUser'));
    }
    public function update($id, UpdateAdminUserRequest $request){
        $adminUser = AdminUser::findOrFail($id);
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->password = $request->password ? Hash::make($request->password) : $adminUser->password;
        $adminUser->update();
        return redirect()->route('admin.admin-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $adminUser = AdminUser::findOrFail($id);
        $adminUser->delete();
        return 'success';
    }
}
