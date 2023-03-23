<?php

namespace App\Http\Controllers\API;

use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;

class ExpiredPropertyController extends Controller
{
    public function property_list(Request $request)
    {
        $date = Carbon::today()->subMonths(12);
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
            'areasize',
            'user'
        ])->whereDate('created_at', '<=', $date)
          ->where('user_id',Auth::user()->id);
        if ($request->get('keywords')) {
            $keyword = $request->get('keywords');
            // $data->whereHas('suppliment', function ($query) use ($keyword) {
            //         $query->where('note',  'LIKE', "{%$keyword%}");
            //     })->whereLike('title',$keyword);
            $data->join('suppliments', 'properties.id', '=', 'suppliments.properties_id')
                ->select('properties.*', 'suppliments.note')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('suppliments.note', 'like', '%' . $keyword . '%');
        }
        if ($request->get('status')) {
            $data->where('status', $request->get('status'));
        }
        if ($request->get('recommended_feature')) {
            $data->where('recommended_feature', $request->get('recommended_feature'));
        }
        if ($request->get('hot_feature')) {
            $data->where('hot_feature', $request->get('hot_feature'));
        }
        if ($request->get('title')) {
            $title = $request->get('title');
            $data->where('title',  'LIKE', "%$title%");
        }
        if ($request->get('p_code')) {
            $data->where('p_code', $request->get('p_code'));
        }
        if ($request->get('status')) {
            $data->where('status', $request->get('status'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('type')) {
            $data->where('properties_type', $request->get('type'));
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
        if ($request->get('min_price') || $request->get('max_price')) {
            $min = $request->get('min_price');
            $max = $request->get('max_price');
            if ($request->get('type') == 1) {
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
            $data->whereHas('payment', function ($query) use ($purchase_type) {
                $query->where('purchase_type', $purchase_type);
            });
        }
        if ($request->get('installment')) {
            $installment = $request->get('installment');
            if ($installment === 'yes') {
                $data->whereHas('payment', function ($query) use ($installment) {
                    $query->where('installment',1);
                });
            }
            if ($installment === 'no') {
                $data->whereHas('payment', function ($query) use ($installment) {
                    $query->where('installment',0);
                });
            }
        }
        if ($request->get('year_of_construction')) {
            $year_of_construction = $request->get('year_of_construction');
            $data->whereHas('situation', function ($query) use ($year_of_construction) {
                $query->where('year_of_construction', $year_of_construction);
            });
        }
        if ($request->get('building_repairing')) {
            $building_repairing = $request->get('building_repairing');
            $data->whereHas('situation', function ($query) use ($building_repairing) {
                $query->where('building_repairing', $building_repairing);
            });
        }
        if ($request->get('building_condition')) {
            $building_condition = $request->get('building_condition');
            $data->whereHas('situation', function ($query) use ($building_condition) {
                $query->where('building_condition', $building_condition);
            });
        }
        if ($request->get('fence_condition')) {
            $fence_condition = $request->get('fence_condition');
            $data->whereHas('situation', function ($query) use ($fence_condition) {
                $query->where('fence_condition', $fence_condition);
            });
        }
        if ($request->get('water_sys')) {
            $water_sys = $request->get('water_sys');
            if ($water_sys == 'yes') {
                $data->whereHas('suppliment', function ($query) use ($water_sys) {
                    $query->where('water_sys', 1);
                });
            }

            if ($water_sys == 'no') {
                $data->whereHas('suppliment', function ($query) use ($water_sys) {
                    $query->where('water_sys', 0);
                });
            }
            
        }
        if ($request->get('electricity_sys')) {
            $electricity_sys = $request->get('electricity_sys');
            if ($electricity_sys == 'yes') {
                $data->whereHas('suppliment', function ($query) use ($electricity_sys) {
                    $query->where('electricity_sys', 1);
                });
            }
            if ($electricity_sys == 'no') {
                $data->whereHas('suppliment', function ($query) use ($electricity_sys) {
                    $query->where('electricity_sys', 0);
                });
            }
        }
        if ($request->get('type_of_street')) {
            $type_of_street = $request->get('type_of_street');
            $data->whereHas('address', function ($query) use ($type_of_street) {
                $query->where('type_of_street', $type_of_street);
            });
        }
        if ($request->get('area_option')) {
            $area_option = $request->get('area_option');
            $data->whereHas('areasize', function ($query) use ($area_option) {
                $query->where('area_option', $area_option);
            });
        }
        if ($request->get('area_size')) {
            $area_size = $request->get('area_size');
            $data->whereHas('areasize', function ($query) use ($area_size) {
                $query->where('area_size', $area_size);
            });
        }
        if ($request->get('width')) {
            $width = $request->get('width');
            $data->whereHas('areasize', function ($query) use ($width) {
                $query->where('width', $width);
            });
        }
        if ($request->get('length_val')) {
            $length_val = $request->get('length_val');
            $data->whereHas('areasize', function ($query) use ($length_val) {
                $query->where('length', $length_val);
            });
        }
        if ($request->get('area_unit')) {
            $area_unit = $request->get('area_unit');
            $data->whereHas('areasize', function ($query) use ($area_unit) {
                $query->where('area_unit', $area_unit);
            });
        }
        if ($request->get('floor_level')) {
            $floor_level = $request->get('floor_level');
            $data->whereHas('areasize', function ($query) use ($floor_level) {
                $query->where('floor_level', $floor_level);
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
        // if ($request->get('carpark')) {
        //     $carpark = $request->get('carpark');
        //     $data->whereHas('partation', function ($query) use ($carpark) {
        //         $query->where('carpark', $carpark);
        //     });
        // }
        
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

        $data = $data->paginate(10);
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
            'user',
            'wishlist'
        ])->where('id', $id)
        ->where('user_id',Auth::user()->id)
        ->first();
        $category = $property->category ?? null;
            
        if (isset($property)) {
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
        return ResponseHelper::fail('Fail', 'you are not own this');
    }

    public function destroy($id)
    {
        $data = Property::where('user_id',auth('api')->user()->id)
                            ->findOrFail($id);
        if (!$data) {
            return ResponseHelper::fail('Fail Request','Data not found');
        }
        $data_images = $data->propertyImage->images;
        $data_images = json_decode($data_images,true);
        
        if ($data) {
            foreach ($data_images as $key => $del) {
                Storage::disk('public')->delete('/property_images/' . $del);
            }
            $data->delete();
            return ResponseHelper::success('Success', 'Successfully Deleted');

        }
    }
    public function renew($id)
    {
        $property = Property::where('user_id',Auth()->id)->findOrFail($id);
        $property->created_at = Carbon::now();
        $property->update();
        return ResponseHelper::success('Success', 'Successfully Renew');
    }
}
