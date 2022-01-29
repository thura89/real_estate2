<?php

namespace App\Http\Controllers\API;

use App\Region;
use App\Property;

use App\Township;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;
use App\Http\Resources\API\RegionResource;

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
        
        if ($request->get('keywords')) {
            $keyword = $request->get('keywords');
            $data->whereHas('suppliment', function ($query) use ($keyword) {
                $query->where('note',  'LIKE', "%$keyword%");
            });
        }
        if ($request->get('p_code')) {
            $data->where('p_code', $request->get('p_code'));
        }
        if ($request->get('property_type')) {
            $data->where('properties_type', $request->get('property_type'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
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
        if ($request->min_price || $request->max_price) {
            $min = $request->min_price;
            $max = $request->max_price;
            if ($request->get('property_type') == 1) {
                $data->whereHas('price', function ($query) use ($min, $max) {
                    $query->whereBetween('price', [$min, $max]);
                });
            }else{
                $data->whereHas('rentprice', function ($query) use ($min, $max) {
                    $query->whereBetween('price', [$min, $max]);
                });
            }
        }
        if ($request->get('sort')) {
            $sort = $request->get('sort');
            /* Sort By Max Price */
            if ($sort == 'max') {
                if ($request->get('property_type') == 1) {
                    $data->whereHas('price', function ($query) {
                        $query->sortByDesc('price');
                    });
                } else{
                    $data->whereHas('rentprice', function ($query) {
                        $query->sortByDesc('price');
                    });
                }
            }
            /* Sort By Min Price */
            if ($sort == 'min') {
                if ($request->get('property_type') == 1) {
                    $data->whereHas('price', function ($query) {
                        $query->sort();
                    });
                } else{
                    $data->whereHas('rentprice', function ($query) {
                        $query->sort();
                    });
                }
            }
            if ($sort == 'new') {
                $data->orderBy('updated_at', 'DESC');
            }
            if ($sort == 'old') {
                $data->orderBy('updated_at', 'ASC');
            }
        }else{
            $data->orderBy('updated_at', 'DESC');
        }
        $data = $data->paginate(10);
        $data = PropertyList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }

    public function recommend_property(Request $request)
    {
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
        ]);
        if ($request->get('property_type')) {
            $data->where('properties_type', $request->get('property_type'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            $data->whereHas('address', function ($query) use ($region) {
                $query->where('region', $region);
            });
        }
        $data = $data->where('status', 1)
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(10);
        
        $data = PropertyList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }
    public function show(Request $request, $id)
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
        ])->where('id', $id)->first();
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
        return ResponseHelper::success('Success', RegionResource::collection($data));
    }

    public function township(Request $request, $id)
    {
        $data = Township::where('region_id', $id)->get();
        return ResponseHelper::success('Success', RegionResource::collection($data));
    }

    public function const(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'const_name' => 'required',
            'language' => 'required|in:mm,en',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $const_name = $request->const_name;
        if ($request->language == 'en') {
            $data = config('const.' . $const_name . '');
        }
        if ($request->language == 'mm') {
            $data = config('const_mm.' . $const_name . '');
        }

        if ($data) {
            return ResponseHelper::success('Success', $data);
        }
        return ResponseHelper::fail('Fail', null);
    }
}
