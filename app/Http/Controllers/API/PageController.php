<?php

namespace App\Http\Controllers\API;

use App\Property;
use Illuminate\Http\Request;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\RegionResource;
use App\Http\Resources\PropertyList;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;
use App\Region;
use App\Township;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return Property::all();
    }

    public function property_list(Request $request)
    {
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
        ]);
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


        $data = PropertyList::collection($data)->additional(['result'=>true,'message'=>'Success']);

        return $data;

    }
    public function show(Request $request,$id)
    {
        /* Get Property */
        $property = Property::with([
            'address',
            'areasize',
            'partation',
            'payment',
            'price',
            'rentPrice',
            'propertyImage',
            'situation',
            'suppliment',
            'unitAmenity',
            'user'
        ])->where('id',$id)->first();
        $category = $property->category;

        if ($property) {
            /* Redirect to Edit Page By Relative */
            /* House , Shoop */
            if ($category == 1 || $category == 6) {
                $data = new PropertyDetail16($property);
                return ResponseHelper::success('Success', $data);
            }
            /* Land , House Land , Industiral */
            if ($category == 2 || $category == 5 || $category == 7) {
                $data = new PropertyDetail257($property);
                return ResponseHelper::success('Success', $data);
            }
            /* Aparment Condo and Office */
            if ($category == 3 || $category == 4 || $category == 8) {
                $data = new PropertyDetail348($property);
                return ResponseHelper::success('Success', $data);
            }
            
        }
        return ResponseHelper::fail('Fail', null);
        
    }

    public function region(Request $request)
    {
        $data = Region::all();
        $data = RegionResource::collection($data)->additional(['result'=>true,'message'=>'Success']);
        return $data;
    }

    public function township(Request $request,$id)
    {
        $data = Township::where('region_id',$id)->get();
        $data = RegionResource::collection($data)->additional(['result'=>true,'message'=>'Success']);
        return $data;
    }

    public function const()
    {
        $data = config('const');
        return ResponseHelper::success('Success', $data);
    }
}
