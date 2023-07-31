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
use App\Http\Resources\PropertyDetail;
use Illuminate\Support\Facades\Storage;
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
            'propertyImage',
            'areasize',
            'user',
            'suppliment'
        ])->whereDate('properties.created_at', '>=', Carbon::today()->subMonths(12))->where('status', config('const.publish')); //published Status

        if ($request->get('keywords')) {
            $keyword = $request->get('keywords');
            $data->join('suppliments', 'properties.id', '=', 'suppliments.properties_id')
                ->select('properties.*', 'suppliments.note')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('suppliments.note', 'like', '%' . $keyword . '%');
        }
        if ($request->get('title')) {
            $title = $request->get('title');
            $data->where('title',  'LIKE', "%$title%");
        }
        if ($request->get('p_code')) {
            $data->where('p_code', $request->get('p_code'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('type')) {
            $data->where('properties_type', $request->get('type'));
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            if ($region != 0) {
                $data->whereHas('address', function ($query) use ($region) {
                    $query->where('region', $region);
                });
            } else {
                $data;
            }
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
            $data->whereHas('price', function ($query) use ($min, $max) {
                $query->whereBetween('price', [$min, $max]);
            });
        }
        if ($request->get('currency_code')) {
            $currency_code = $request->get('currency_code');
            $data->whereHas('price', function ($query) use ($currency_code) {
                $query->where('currency_code', $currency_code);
            });
        }
        if ($request->get('repairing')) {
            $repairing = $request->get('repairing');
            $data->whereHas('situation', function ($query) use ($repairing) {
                $query->where('building_repairing', $repairing);
            });
        }
        if ($request->get('condition')) {
            $condition = $request->get('condition');
            $data->whereHas('situation', function ($query) use ($condition) {
                $query->where('building_condition', $condition);
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
        if ($request->get('length')) {
            $length = $request->get('length');
            $data->whereHas('areasize', function ($query) use ($length) {
                $query->where('length', $length);
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
                $query->where('level', $floor_level);
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
        if ($request->get('user_type')) {
            $user_type = $request->get('user_type');
            $data->whereHas('user', function ($query) use ($user_type) {
                $query->where('user_type', $user_type);
            });
        }
        if ($request->get('sort')) {
            $sort = $request->get('sort');
            /* Sort By Max Price */
            if ($sort == 'max') {
                $data->join('prices', 'properties.id', '=', 'prices.properties_id')
                    ->select('properties.*', 'prices.price as price_order')
                    ->orderBy('price_order', 'DESC');
            }
            /* Sort By Min Price */
            if ($sort == 'min') {
                $data->join('prices', 'properties.id', '=', 'prices.properties_id')
                    ->select('properties.*', 'prices.price as price_order')
                    ->orderBy('price_order', 'ASC');
            }
            if ($sort == 'new') {
                $data->orderBy('updated_at', 'DESC');
            }
            if ($sort == 'old') {
                $data->orderBy('updated_at', 'ASC');
            }
        } else {
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
            'propertyImage',
        ])->whereDate('properties.created_at', '>=', Carbon::today()->subMonths(12))->where('status', config('const.publish')); //published Status
        if ($request->get('property_type')) {
            $data->where('properties_type', $request->get('property_type'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            if ($region != 0) {
                $data->whereHas('address', function ($query) use ($region) {
                    $query->where('region', $region);
                });
            } else {
                $data;
            }
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
            'propertyImage',
        ])->whereDate('properties.created_at', '>=', Carbon::today()->subMonths(12))->where('status', config('const.publish')); //published Status
        if ($request->get('property_type')) {
            $data->where('properties_type', $request->get('property_type'));
        }
        if ($request->get('category')) {
            $data->where('category', $request->get('category'));
        }
        if ($request->get('region')) {
            $region = $request->get('region');
            if ($region != 0) {
                $data->whereHas('address', function ($query) use ($region) {
                    $query->where('region', $region);
                });
            } else {
                $data;
            }
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
        if ($request->expired) {
            $data->where('status', config('const.pending'));
        }
        if ($request->keywords) {
            $keyword = $request->keywords;
            $data->whereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            })->orWhereHas('region', function ($qr) use ($keyword) {
                $qr->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }
        if ($request->type) {
            $data->where('properties_type', $request->type);
        }
        if ($request->category) {
            $data->where('properties_category', $request->category);
        }

        $data =  $data->orderBy('created_at', 'DESC')->paginate(10);

        return Want2BuyRentListsResource::collection($data)->additional(['result' => true, 'message' => 'Success']);
    }

    /** Want To Buy Rent Detail */
    public function wantToBuyRentshow($id)
    {
        $data = WantToBuyRent::with('user')->findOrFail($id);
        if (isset($data)) {
            $data->view_count = $data->view_count + 1;
            $data->update();
        }
        $data = new Want2BuyRentDetailsResource($data);
        return ResponseHelper::success('success', $data);
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
            'propertyImage',
            'situation',
            'suppliment',
            'user',
            'wishlist'
        ])->where('id', $id)->first();
        $category = $property->category;
        if (isset($property)) {
            $property->view_count = $property->view_count + 1;
            $property->update();
        }
        if ($property) {
            $data = new PropertyDetail($property);
            return ResponseHelper::success('Success', $data);
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


    public function categoryItemCount(Request $request)
    {
        $lang = 'const';
        $region_id = $request->region_id;
        if ($request->lang == 'en') {
            $lang = 'const';
        }
        if ($request->lang == 'mm') {
            $lang = 'const_mm';
        }
        // CateCount1
        $category_1 = Property::query()->with(['address'])->where('category', 1)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_1->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_1;
        }
        // CateCount2
        $category_2 = Property::query()->with(['address'])->where('category', 2)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_2->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_2;
        }
        // CateCount1
        $category_3 = Property::query()->with(['address'])->where('category', 3)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_3->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_3;
        }
        // CateCount4
        $category_4 = Property::query()->with(['address'])->where('category', 4)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_4->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_4;
        }
        // CateCount5
        $category_5 = Property::query()->with(['address'])->where('category', 5)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_5->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_5;
        }
        // CateCount6
        $category_6 = Property::query()->with(['address'])->where('category', 6)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_6->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_6;
        }
        // CateCount7
        $category_7 = Property::query()->with(['address'])->where('category', 7)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_7->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_7;
        }
        // CateCount8
        $category_8 = Property::query()->with(['address'])->where('category', 8)
                                       ->where('status', config('const.publish'));
        if ($region_id != 0) {
            $category_8->whereHas('address', function ($query) use ($region_id) {
                $query->where('region', $region_id);
            });
        } else {
            $category_8;
        }

        // $category_2 = Property::query()->where('category', 2)->where('status', config('const.publish'))->count();
        // $category_3 = Property::query()->where('category', 3)->where('status', config('const.publish'))->count();
        // $category_4 = Property::query()->where('category', 4)->where('status', config('const.publish'))->count();
        // $category_5 = Property::query()->where('category', 5)->where('status', config('const.publish'))->count();
        // $category_6 = Property::query()->where('category', 6)->where('status', config('const.publish'))->count();
        // $category_7 = Property::query()->where('category', 7)->where('status', config('const.publish'))->count();
        // $category_8 = Property::query()->where('category', 8)->where('status', config('const.publish'))->count();
        $data = array(
            'category_itemcount' => [
                [
                    'category_id' => '1',
                    'category_name' => config($lang . '.property_category.1'),
                    'item_count' => (string)$category_1->count(),
                    'url' => asset('storage/category_img/house.png'),
                ],
                [
                    'category_id' => '2',
                    'category_name' => config($lang . '.property_category.2'),
                    'item_count' => (string)$category_2->count(),
                    'url' => asset('storage/category_img/land_house.png'),
                ],
                [
                    'category_id' => '3',
                    'category_name' => config($lang . '.property_category.3'),
                    'item_count' => (string)$category_3->count(),
                    'url' => asset('storage/category_img/apartment.png'),
                ],
                [
                    'category_id' => '4',
                    'category_name' => config($lang . '.property_category.4'),
                    'item_count' => (string)$category_4->count(),
                    'url' => asset('storage/category_img/office.png'),
                ],
                [
                    'category_id' => '5',
                    'category_name' => config($lang . '.property_category.5'),
                    'item_count' => (string)$category_5->count(),
                    'url' => asset('storage/category_img/land.png'),
                ],
                [
                    'category_id' => '6',
                    'category_name' => config($lang . '.property_category.6'),
                    'item_count' => (string)$category_6->count(),
                    'url' => asset('storage/category_img/shop.png'),
                ],
                [
                    'category_id' => '7',
                    'category_name' => config($lang . '.property_category.7'),
                    'item_count' => (string)$category_7->count(),
                    'url' => asset('storage/category_img/industrial.png'),
                ],
                [
                    'category_id' => '8',
                    'category_name' => config($lang . '.property_category.8'),
                    'item_count' => (string)$category_8->count(),
                    'url' => asset('storage/category_img/condo.png'),
                ],
            ]
        );
        return ResponseHelper::success('Success', $data);
    }
}