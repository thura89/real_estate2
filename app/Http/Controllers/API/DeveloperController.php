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
        $data = User::query()->with('properties')->where('user_type',config('const.Developer'));

        if ($request->get('keywords')) {
            $data->where('name','like', '%' . $request->get('keywords') . '%')
                 ->orWhere('company_name','like', '%' . $request->get('keywords') . '%')
                 ->orWhere('email','like', '%' . $request->get('keywords') . '%')
                 ->orWhere('phone','like', '%' . $request->get('keywords') . '%');
        }
        if ($request->get('region')) {
            $data->where('region', $request->get('region'));
        }
        if ($request->get('township')) {
            $data->where('township', $request->get('township'));
        }
        
        $data =  $data->orderBy('created_at','DESC')->paginate(10);

        $data = DeveloperList::collection($data)->additional(['result'=>true,'message'=>'Success']);

        return $data;

    }
    public function developerProperties(Request $request,$id)
    {
        /* Get Property */
        $data = User::query()->having('user_type',config('const.Developer'))->with([
            'properties',
        ])->where('id',$id);
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
        
        $data =  $data->orderBy('created_at','DESC')->paginate(10);

        $data = PropertiesByDeveloper::collection($data);

        return $data;
        
    }
    // public function agentPropertyDetail(Request $request,$id,$property)
    // {
    //     $property = Property::with([
    //         'address',
    //         'areasize',
    //         'partation',
    //         'payment',
    //         'price',
    //         'rentPrice',
    //         'propertyImage',
    //         'situation',
    //         'suppliment',
    //         'unitAmenity',
    //         'user'
    //     ])->where('id',$id)->first();
    //     $category = $property->category;

    //     if ($property) {
    //         /* Redirect to Edit Page By Relative */
    //         /* House , Shoop */
    //         if ($category == 1 || $category == 6) {
    //             $data = new PropertyDetail16($property);
    //             return ResponseHelper::success('Success', $data);
    //         }
    //         /* Land , House Land , Industiral */
    //         if ($category == 2 || $category == 5 || $category == 7) {
    //             $data = new PropertyDetail257($property);
    //             return ResponseHelper::success('Success', $data);
    //         }
    //         /* Aparment Condo and Office */
    //         if ($category == 3 || $category == 4 || $category == 8) {
    //             $data = new PropertyDetail348($property);
    //             return ResponseHelper::success('Success', $data);
    //         }
            
    //     }
    //     return ResponseHelper::fail('Fail', null);
    // }
}
