<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Property;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\AgentList;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgentByProperties;

class AgentController extends Controller
{
    public function agentList(Request $request)
    {
        $data = User::query()->where('user_type', config('const.Agent'));
        if ($request->get('name')) {
            $name = $request->get('name');
            $data->where("name", "LIKE", "%{$name}%");
        }
        if ($request->get('company_name')) {
            $company_name = $request->get('company_name');
            $data->where("company_name", "LIKE", "%{$company_name}%");
        }
        if ($request->get('email')) {
            $email = $request->get('email');
            $data->where("email", "LIKE", "%{$email}%");
        }
        if ($request->get('phone')) {
            $phone = $request->get('phone');
            $data->where("phone", "LIKE", "%{$phone}%");
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

        $data =  $data->with('properties')->orderBy('created_at', 'DESC')->paginate(10);
        $data = AgentList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }
    public function agentProperties(Request $request, $id)
    {
        $data = User::where('id', $id)->where('user_type', config('const.Agent'));

        if ($request->get('category')) {
            $category = $request->get('category');
            $data->with(["properties" => function ($query) use ($category) {
                $query->where('properties.category', $category);
            }]);
        }
        if ($request->get('property_type')) {
            $type = $request->get('property_type');
            $data->with(["properties" => function ($query) use ($type) {
                $query->where('properties.properties_type', $type);
            }]);
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            $data->whereHas('properties', function ($query) use ($region) {
                $query->whereHas('address', function ($qa) use ($region) {
                    $qa->whereHas('region', function ($qr) use ($region) {
                        $qr->where('name', 'LIKE', '%' . $region . '%');
                    });
                });
            });
        }
        if ($request->get('township')) {
            $township = $request->get('township');
            $data->whereHas('properties', function ($query) use ($township) {
                $query->whereHas('address', function ($qa) use ($township) {
                    $qa->whereHas('township', function ($qr) use ($township) {
                        $qr->where('name', 'LIKE', '%' . $township . '%');
                    });
                });
            });
        }

        $data =  $data->orderBy('created_at', 'DESC')->paginate(10);
        if (!$data) {
            return ResponseHelper::fail('Fail', null);
        }
        return AgentByProperties::collection($data)->additional(['result' => true, 'message' => 'Success']);
    }
}
