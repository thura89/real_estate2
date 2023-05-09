<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Property;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperList;
use App\Http\Resources\PropertiesByDeveloper;

class DeveloperController extends Controller
{
    public function index(Request $request)
    {
        return Property::all();
    }

    public function developerList(Request $request)
    {
        $data = User::query()->with('properties')->where('user_type', config('const.Developer'));

        if ($request->get('keywords')) {
            $data->where('name', 'like', '%' . $request->get('keywords') . '%')
                ->orWhere('company_name', 'like', '%' . $request->get('keywords') . '%')
                ->orWhere('email', 'like', '%' . $request->get('keywords') . '%')
                ->orWhere('phone', 'like', '%' . $request->get('keywords') . '%');
        }
        if ($request->get('region')) {
            $data->where('region', $request->get('region'));
        }
        if ($request->get('township')) {
            $data->where('township', $request->get('township'));
        }

        $data =  $data->orderBy('created_at', 'DESC')->paginate(10);

        $data = DeveloperList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }
    public function developerProperties(Request $request, $id)
    {
        /* Get Property */
        $data = User::query()->having('user_type', config('const.Developer'))->with([
            'properties',
        ])->where('id', $id);
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('property_type')) {
            $data->where('properties_type', $request->get('property_type'));
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            $data->whereHas('address', function ($query) use ($region) {
                $query->where('region', $region);
            });
        }
        if ($request->get('township')) {
            $township = $request->get('township');
            $data->whereHas('address', function ($query) use ($township) {
                $query->where('township', $township);
            });
        }

        $data =  $data->orderBy('created_at', 'DESC')->paginate(10);
        if (!$data) {
            return ResponseHelper::fail('Fail', null);
        }
        return PropertiesByDeveloper::collection($data);
    }
}
