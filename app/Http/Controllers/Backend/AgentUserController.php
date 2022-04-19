<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Region;
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

class AgentUserController extends Controller
{
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.agent-user.index',compact('regions'));
    }
    public function ssd(Request $request)
    {
        $data = User::query()->where('user_type',4)->with([
            'region','township']);// 4 = Agent User
            
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
        if ($request->get('agent_type')) {
            $data->where('agent_type', $request->get('agent_type'));
        }
        return Datatables::of($data)
        ->editColumn('profile_photo',function($each){
            return "<img src='$each->profile_photo' class='img-thumbnail' width='80'>" ?? '-';
        })
        ->editColumn('agent_type',function($each){
            return config('const.agent_type')[$each->agent_type] ?? '-';
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
                       '<span class="badge badge-primary">'.$each->ip.'</span>';
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
            $edit_icon = '<a href="'.route('admin.agent-user.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="" class="text-danger delete" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">' .$edit_icon.$delete_icon .'</div>';
        })
        ->rawColumns(['profile_photo','user_agent','action'])
        ->make(true);
        
    }
    public function create(){
        $regions = Region::get(['name', 'id']);
        return view('backend.agent-user.create',compact('regions'));
    }
    public function store(CreateAgentUserRequest $request){
        $agentUser = new User();
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
        $agentUser->user_type = config('const.Agent');
        $agentUser->company_name = $request->company_name;
        $agentUser->name = $request->name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->region = $request->region;
        $agentUser->township = $request->township;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->profile_photo = $profile_img_name;
        $agentUser->cover_photo = $cover_img_name;
        $agentUser->password = Hash::make($request->password);
        $agentUser->save();
        return redirect()->route('admin.agent-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $regions = Region::get(['name', 'id']);
        $agentUser = User::findOrFail($id);
        return view('backend.agent-user.edit',compact('agentUser','regions'));
    }
    public function update($id, UpdateAgentUserRequest $request){
        $agentUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$agentUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $agentUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$agentUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $agentUser->cover_photo = $cover_img_name;
        }
        $agentUser->company_name = $request->company_name;
        $agentUser->name = $request->name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->region = $request->region;
        $agentUser->township = $request->township;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->password = $request->password ? Hash::make($request->password) : $agentUser->password;
        $agentUser->update();
        return redirect()->route('admin.agent-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $agentUser = User::findOrFail($id);
        $agentUser->delete();
        return 'success';
    }
}
