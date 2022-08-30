<?php

namespace App\Http\Controllers\API;

use App\Region;
use App\Property;

use App\Township;
use Carbon\Carbon;
use App\WantToBuyRent;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\RegionResource;
use App\Http\Resources\API\Want2BuyRentListsResource;
use App\Http\Resources\API\Want2BuyRentDetailsResource;

class PageController extends Controller
{
    public function property_list(Request $request)
    {
        
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
            'areasize',
            'user',
            'suppliment'
        ])->whereDate('created_at', '>=', Carbon::today()->subMonths(12))->where('status',1);//published Status
        
        if ($request->get('keywords')) {
            $keyword = $request->get('keywords');
            $data->join('suppliments', 'properties.id', '=', 'suppliments.properties_id')
                ->select('properties.*', 'suppliments.note')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('suppliments.note', 'like', '%' . $keyword . '%');
        }
        if ($request->get('title')) {
            $title = $request->get('title');
            $data->whereHas('suppliment', function ($query) use ($title) {
                $query->where('note', 'like', '%'.$title.'%');
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
        if ($request->get('currency_code')) {
            $currency_code = $request->get('currency_code');
            if ($request->get('property_type') == 1) {
                $data->whereHas('price', function ($query) use ($currency_code) {
                    $query->where('currency_code', $currency_code);
                });
            }else{
                $data->whereHas('rentprice', function ($query) use ($currency_code) {
                    $query->where('currency_code', $currency_code);
                });
            }
        }
        if ($request->get('purchase_type')) {
            $purchase_type = $request->get('purchase_type');
            $data->with('payment')->whereHas('payment', function ($query) use ($purchase_type) {
                $query->where('purchase_type', $purchase_type);
            });
        }
        if ($request->get('installment')) {
            $installment = $request->get('installment');
            if ($installment === 'yes') {
                $data->with('payment')->whereHas('payment', function ($query) use ($installment) {
                    $query->where('installment',1);
                });
            }
            if ($installment === 'no') {
                $data->with('payment')->whereHas('payment', function ($query) use ($installment) {
                    $query->where('installment',0);
                });
            }
        }
        if ($request->get('year_of_construction')) {
            $year_of_construction = $request->get('year_of_construction');
            $data->with('situation')->whereHas('situation', function ($query) use ($year_of_construction) {
                $query->where('year_of_construction', $year_of_construction);
            });
        }
        if ($request->get('building_repairing')) {
            $building_repairing = $request->get('building_repairing');
            $data->with('situation')->whereHas('situation', function ($query) use ($building_repairing) {
                $query->where('building_repairing', $building_repairing);
            });
        }
        if ($request->get('building_condition')) {
            $building_condition = $request->get('building_condition');
            $data->with('situation')->whereHas('situation', function ($query) use ($building_condition) {
                $query->where('building_condition', $building_condition);
            });
        }
        if ($request->get('fence_condition')) {
            $fence_condition = $request->get('fence_condition');
            $data->with('situation')->whereHas('situation', function ($query) use ($fence_condition) {
                $query->where('fence_condition', $fence_condition);
            });
        }
        if ($request->get('type_of_street')) {
            $type_of_street = $request->get('type_of_street');
            $data->whereHas('address', function ($query) use ($type_of_street) {
                $query->where('type_of_street', $type_of_street);
            });
        }
        if ($request->get('measurement')) {
            $measurement = $request->get('measurement');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($measurement) {
                $query->where('measurement', $measurement);
            });
        }
        if ($request->get('front_area')) {
            $front_area = $request->get('front_area');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($front_area) {
                $query->where('front_area', $front_area);
            });
        }
        if ($request->get('building_width')) {
            $building_width = $request->get('building_width');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($building_width) {
                $query->where('building_width', $building_width);
            });
        }
        if ($request->get('building_length')) {
            $building_length = $request->get('building_length');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($building_length) {
                $query->where('building_length', $building_length);
            });
        }
        if ($request->get('fence_width')) {
            $fence_width = $request->get('fence_width');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($fence_width) {
                $query->where('fence_width', $fence_width);
            });
        }
        if ($request->get('fence_length')) {
            $fence_length = $request->get('fence_length');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($fence_length) {
                $query->where('fence_length', $fence_length);
            });
        }
        if ($request->get('floor_level')) {
            $floor_level = $request->get('floor_level');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($floor_level) {
                $query->where('level', $floor_level);
            });
        }
        if ($request->get('height')) {
            $height = $request->get('height');
            $data->with('areasize')->whereHas('areasize', function ($query) use ($height) {
                $query->where('height', $height);
            });
        }       
        if ($request->get('partation_type')) {
            $partation_type = $request->get('partation_type');
            $data->whereHas('partation', function ($query) use ($partation_type) {
                $query->where('type', $partation_type);
            });
        }
        if ($request->get('bed_room')) {
            $bed_room = $request->get('bed_room');
            $data->whereHas('partation', function ($query) use ($bed_room) {
                $query->where('bed_room', $bed_room);
            });
        }
        if ($request->get('bath_room')) {
            $bath_room = $request->get('bath_room');
            $data->whereHas('partation', function ($query) use ($bath_room) {
                $query->where('bath_room', $bath_room);
            });
        }   
        if ($request->get('sort')) {
            $sort = $request->get('sort');
            /* Sort By Max Price */
            if ($sort == 'max') {
                if ($request->get('property_type') == 1) {
                    $data->join('prices', 'properties.id', '=', 'prices.properties_id')
                         ->select('properties.*', 'prices.price as price_order')
                         ->orderBy('price_order', 'DESC');
                } else{
                    $data->join('rent_prices', 'properties.id', '=', 'rent_prices.properties_id')
                         ->select('properties.*', 'rent_prices.price as price_order')
                         ->orderBy('price_order', 'DESC');
                }
            }
            /* Sort By Min Price */
            if ($sort == 'min') {
                if ($request->get('property_type') == 1) {
                    $data->join('prices', 'properties.id', '=', 'prices.properties_id')
                         ->select('properties.*', 'prices.price as price_order')
                         ->orderBy('price_order', 'ASC');
                } else{
                    $data->join('rent_prices', 'properties.id', '=', 'rent_prices.properties_id')
                         ->select('properties.*', 'rent_prices.price as price_order')
                         ->orderBy('price_order', 'ASC');
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
        $data = $data->paginate('10');
        $data = PropertyList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }

    /** Recommend Property List */
    public function recommend_property(Request $request)
    {
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
            ])->whereDate('created_at', '>=', Carbon::today()->subMonths(12))->where('status',1);//published Status
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
        $data = $data->where('recommended_feature', 1)
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(10);
        
        $data = PropertyList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }

    /** Hot Property List */
    public function hot_property(Request $request)
    {
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
        ])->whereDate('created_at', '>=', Carbon::today()->subMonths(12))->where('status',1);//published Status
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
        $data = $data->where('hot_feature', 1)
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(10);
        
        $data = PropertyList::collection($data)->additional(['result' => true, 'message' => 'Success']);

        return $data;
    }

    /** Want To Buy Rent List */
    public function wantToBuyRent(Request $request)
    {
        $data = WantToBuyRent::query()->with([
            'region',
            'township',
        ]);

        if($request->keywords){
            $keyword = $request->keywords;
            $data->whereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            })->orWhereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }
        if ($request->type) {
            $data->where('properties_type',$request->type);
        }
        if ($request->category) {
            $data->where('properties_category',$request->category);
        }

        $data =  $data->orderBy('created_at','DESC')->paginate(10);

        return Want2BuyRentListsResource::collection($data)->additional(['result'=>true,'message'=>'Success']);
        
    }

    /** Want To Buy Rent Detail */
    public function wantToBuyRentshow($id)
    {
        $data = WantToBuyRent::with('user')->findOrFail($id);
        $data = new Want2BuyRentDetailsResource($data);
        return ResponseHelper::success('success',$data);
    }

    /** Property Detail */
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
            'user',
            'wishlist'
        ])->where('id', $id)->first();
        $category = $property->category;

        if ($property) {
            /* Redirect to Edit Page By Relative */
            /* House , Shoop */
            if ($category == 1 || $category == 6) {
                // return $property;
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
            'language' => 'required|in:mm,en',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $const_name = $request->const_name;
        if ($request->language == 'en') {
            $data = config('const');
        }
        if ($request->language == 'mm') {
            $data = config('const_mm');
        }

        if ($data) {
            return ResponseHelper::success('Success', $data);
        }
        return ResponseHelper::fail('Fail', null);
    }

}
