<?php

namespace App\Http\Controllers\API;

use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PropertyDetail;
use Illuminate\Support\Facades\Storage;

class ExpiredPropertyController extends Controller
{
    public function property_list(Request $request)
    {
        $date = Carbon::today()->subMonths(12);
        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'propertyImage',
            'areasize',
            'user'
        ])->whereDate('created_at', '<=', $date)
            ->where('status', config('const.pending'))
            ->where('user_id', Auth::user()->id);

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
            'price',
            'propertyImage',
            'situation',
            'suppliment',
            'user',
            'wishlist'
        ])->where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($property) {
            $data = new PropertyDetail($property);
            return ResponseHelper::success('Success', $data);
            /* Redirect to Edit Page By Relative */
            /* House , Shoop */
        }
        return ResponseHelper::fail('Fail', 'you are not own this');
    }

    public function destroy($id)
    {
        $data = Property::where('user_id', Auth::user()->id)
            ->findOrFail($id);
        if (!$data) {
            return ResponseHelper::fail('Fail Request', 'Data not found');
        }
        $data_images = $data->propertyImage->images;
        $data_images = json_decode($data_images, true);

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
        $property = Property::where('user_id', Auth::user()->id)->findOrFail($id);
        $property->status = config('const.publish');
        $property->created_at = Carbon::now();
        $property->updated_at = Carbon::now();
        $property->update();
        return ResponseHelper::success('Success', 'Successfully Renew');
    }
}
