<?php

namespace App\Http\Controllers\Backend;

use App\AgentUser;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateAgentUserRequest;
use App\Http\Requests\UpdateAgentUserRequest;

class AgentUserController extends Controller
{
    public function index()
    {
        return view('backend.agent-user.index');
    }
    public function ssd()
    {
        $data = AgentUser::query();    
        return Datatables::of($data)
        ->editColumn('agent_type',function($each){
            return config('const.agent_type')[$each->agent_type];
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
            $edit_icon = '<a href="'.route('admin.agent-user.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="" class="text-danger delete" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">' .$edit_icon.$delete_icon .'</div>';
        })
        ->rawColumns(['user_agent','action'])
        ->make(true);
        
    }
    public function create(){
        return view('backend.agent-user.create');
    }
    public function store(CreateAgentUserRequest $request){
        $agentUser = new AgentUser();
        $agentUser->company_name = $request->company_name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->password = Hash::make($request->password);
        $agentUser->save();
        return redirect()->route('admin.agent-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $agentUser = AgentUser::findOrFail($id);
        return view('backend.agent-user.edit',compact('agentUser'));
    }
    public function update($id, UpdateAgentUserRequest $request){
        $agentUser = AgentUser::findOrFail($id);
        $agentUser->company_name = $request->company_name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->password = $request->password ? Hash::make($request->password) : $agentUser->password;
        $agentUser->update();
        return redirect()->route('admin.agent-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $agentUser = AgentUser::findOrFail($id);
        $agentUser->delete();
        return 'success';
    }
}
