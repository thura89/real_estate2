<?php

namespace App\Http\Controllers\API;


use App\Price;
use App\Address;
use App\Payment;
use App\AreaSize;
use App\Property;
use App\Partation;
use App\RentPrice;
use App\Situation;
use Carbon\Carbon;
use App\LotFeature;
use App\Suppliment;
use App\UnitAmenity;
use App\PropertyImage;
use App\BuildingAmenity;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerate;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PropertyDetail;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ApartCondoCreateRequest;
use App\Http\Requests\ApartCondoUpdateRequest;

class PropertyController extends Controller
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
            'propertyImage',
            'areasize',
            'user',
            'wishlist',
        ])->whereDate('properties.created_at', '>=', Carbon::today()->subMonths(12))
            ->where('user_id', Auth::user()->id)
            ->where('status', config('const.publish')); //published Status;

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
        ])->whereDate('properties.created_at', '>=', Carbon::today()->subMonths(12))
            ->where('user_id', Auth::user()->id)->find($id);
        if ($property) {
            $data = new PropertyDetail($property);
            return ResponseHelper::success('Success', $data);
            /* Redirect to Edit Page By Relative */
            /* House , Shoop */
        }
        return ResponseHelper::fail('Fail', null);
    }

    public function multiSplit($string)
    {
        $output = array();
        $cols = explode(",", $string);

        foreach ($cols as $col) {
            $dashcols = explode("-", $col);
            $output[] = $dashcols[0];
        }

        return $output;
    }

    // Property Create
    public function PropertyCreate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            /* Property Type */
            'property_type' => 'required',
            'property_category' => 'required',

            /* Address */
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Situation */
            'repairing' => 'required',
            'condition' => 'required',

            /* Sale Price */
            'price' => 'required_if:property_type,==,1',
            'currency_code' => 'required_if:property_type,==,1',

            /* Image */
            'images' => 'required',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->title = $request->title;
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth::user()->id;
            $property->lat = '16.7731649'; // Sample lag
            $property->long = '96.1597431'; // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->recommended_feature = $request->recommended_feature ? 1 : 0; //Recommend Feature Status
            $property->hot_feature = $request->hot_feature ? 1 : 0; //Hot Feature Status
            $property->status = config('const.publish'); //Publish Status
            $property->save();


            /* Address Store */
            $address = new Address();
            $address->region = $request->region ?? null;
            $address->township = $request->township ?? null;
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->area_option = $request->area_option;
            /* Width x length */
            if ($request->area_option == 1) {
                $area_size->width = $request->width;
                $area_size->length = $request->length;
            }
            /** Area */
            if ($request->area_option == 2) {
                $area_size->area_size = $request->area_size;
                $area_size->area_unit = $request->area_unit;
            }

            if ($request->property_category == 3 || $request->property_category == 4 || $request->property_category == 6 || $request->property_category == 8) {
                $area_size->level = $request->floor_level ?? null;
            }

            $property->areasize()->save($area_size);

            /* Partation Store */
            $partation = new Partation();
            $partation->type = 1; //Default 
            $partation->bed_room = $request->bed_room ?? null;
            $partation->bath_room = $request->bath_room ?? null;
            $property->partation()->save($partation);

            /* Price Store */
            $price = new Price();
            $price->price = $request->price;
            $price->currency_code = $request->currency_code;
            $property->price()->save($price);

            /* Situation Store */
            $situation = new Situation();
            $situation->building_repairing = $request->repairing;
            $situation->building_condition = $request->condition;
            $property->situation()->save($situation);

            /* Electri & water Store */
            $suppliment = new Suppliment();
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);


            /* Property Image */
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            $property_image = new PropertyImage();
            $property_image->images = json_encode($data);
            $property->propertyImage()->save($property_image);

            DB::commit();
            return ResponseHelper::success('Successfully created', Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Fail to request', $e);
        }
    }

    // Property Update
    public function PropertyUpdate(Request $request)
    {
        $validate = Validator::make($request->all(), [

            /* Address */
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Situation */
            'repairing' => 'required',
            'condition' => 'required',

            /* Sale Price */
            'price' => 'required_if:property_type,==,1',
            'currency_code' => 'required_if:property_type,==,1',

        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Call Id */
            $property = Property::where('user_id', Auth::user()->id)->findOrFail($request->id);
            $property->title = $request->title;
            $property->recommended_feature = $request->recommended_feature ? 1 : 0; //Recommend Feature Status
            $property->hot_feature = $request->hot_feature ? 1 : 0; //Hot Feature Status

            // Address Store
            $property->address->region = $request->region ?? $property->address->region;
            $property->address->township = $request->township ?? $property->address->township;

            /** Area Size Store */
            $property->areasize->area_option = $request->area_option;

            if ($property->property_category == 3 || $property->property_category == 4 || $property->property_category == 6 || $property->property_category == 8) {
                $property->areasize->level = $request->floor_level ?? null;
            }

            /* Width x length */
            if ($request->area_option == 1) {
                $property->areasize->width = $request->width;
                $property->areasize->length = $request->length;
            }
            /** Area */
            if ($request->area_option == 2) {
                $property->areasize->area_size = $request->area_size;
                $property->areasize->area_unit = $request->area_unit;
            }

            /* Partation Store */
            $property->partation->bed_room = $request->bed_room ?? $property->partation->bed_room;
            $property->partation->bath_room = $request->bath_room ?? $property->partation->bath_room;

            /* Price Data Store */
            if (!$property->price) {
                /* Price Store */
                $price = new Price();
                $price->price = $request->price;
                $price->currency_code = $request->currency_code;
                $property->price()->save($price);
            } else {
                $property->price->price = $request->price;
                $property->price->currency_code = $request->currency_code;
            }

            /* Situation Store */
            $property->situation->building_repairing = $request->repairing;
            $property->situation->building_condition = $request->condition;

            $property->suppliment->note = $request->note ?? $property->suppliment->note;


            /* Property Image */
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                    $data_images[] = $file_name;
                }
                $decode_images = json_decode($property->propertyImage->images);
                $result = array_merge($decode_images, $data_images);
                $property->propertyImage->images = $result;
            }

            $property->push();

            DB::commit();
            return ResponseHelper::success('Successfully Updated', Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Fail to request', $e);
        }
    }

    /* Create House, Shop Category = 1 / 6 */
    public function house_shop_create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            /* Address */
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',
            'building_name' => 'required_if:property_category,==,6',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'floor_level' => 'required_if:property_category,==,6|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Partation */
            'partation_type' => 'required|in:1,2',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required|in:1,2,3',
            'building_condition' => 'required|in:1,2,3',
            'type_of_building' => 'required_if:property_category,==,1|in:1,2',
            'shop_type' => 'required_if:property_category,==,6|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required|in:1,2,3',
            'installment' => 'required_if:property_type,==,1|in:1,0',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2|in:mmk,sg,us',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1|in:mmk,sg,us',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

            /* Image */
            'images' => 'required',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();

            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->title = $request->title;
            $property->user_id = Auth()->user()->id;
            $property->lat = $request->lat ?? Null; // Sample lag
            $property->long = $request->long ?? Null;
            // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = config('const.publish'); //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name ?? null;
            $address->ward = $request->ward ?? null;
            $address->township = $request->township ?? null;
            $address->type_of_street = $request->type_of_street ?? null;
            if ($request->property_category == 6) {
                $address->building_name = $request->building_name;
            }
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->area_option = $request->area_option;
            /* Width x length */
            if ($request->area_option == 1) {
                $area_size->width = $request->width;
                $area_size->length = $request->length;
            }
            /** Area */
            if ($request->area_option == 2) {
                $area_size->area_size = $request->area_size;
                $area_size->area_unit = $request->area_unit;
            }
            if ($request->property_category == 6) {
                $area_size->level = $request->floor_level;
            }
            $property->areasize()->save($area_size);

            /* Partation Store */
            $partation = new Partation();
            $partation->type = $request->partation_type;
            $partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            // $partation->carpark = $request->carpark ? 1 : 0;
            $property->partation()->save($partation);

            /* Payment Store */
            $payment = new Payment();
            $payment->installment = ($request->installment) ? 1 : 0;
            $payment->purchase_type = $request->purchase_type;
            $property->payment()->save($payment);

            /* Sale Price Data Store */
            if ($request->property_type == 1) {
                /* Price Store */
                $price = new Price();
                $price->price = $request->sale_price;
                $price->area = $request->sale_area;
                $price->price_by_area = $request->sale_price_by_area ?? null;
                $price->currency_code = $request->sale_currency_code;
                $property->price()->save($price);
            }
            /* Rent Price Data Store */
            if ($request->property_type == 2) {
                /* Price Store */
                $price = new RentPrice();
                $price->price = $request->price;
                $price->area = $request->area;
                $price->price_by_area = $request->price_by_area ?? null;
                $price->currency_code = $request->currency_code;
                $price->minimum_month = $request->minimum_month;
                $price->rent_pay_type = $request->rent_pay_type;
                $price->rent_payby_daily = $request->rent_payby_daily;
                $property->rentprice()->save($price);
            }

            /* Situation Store */
            $situation = new Situation();
            if ($request->property_category == 1) {
                $situation->type_of_building = $request->type_of_building;
            }
            if ($request->property_category == 6) {
                $situation->shop_type = $request->shop_type;
            }
            $situation->year_of_construction = $request->year_of_construction;
            $situation->building_repairing = $request->building_repairing;
            $situation->building_condition = $request->building_condition;
            $property->situation()->save($situation);

            /* Electri & water Store */
            $suppliment = new Suppliment();
            // $suppliment->water_sys = $request->water ? 1 : 0;
            // $suppliment->electricity_sys = $request->electric ? 1 : 0;
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);

            /* Unit Aminity */
            if ($request->unit_amenity) {
                if ($request->property_category == 1) {
                    $unitAmenity = new UnitAmenity();
                    $splice_amenity = $request->unit_amenity;
                    $splice_amenity = explode('|', $splice_amenity);
                    foreach ($splice_amenity as $key => $dat) {
                        $unitAmenity->$dat = 1;
                    }
                    $property->unitAmenity()->save($unitAmenity);
                }
            }

            /* Building Amenity */
            if ($request->building_amenity) {
                if ($request->property_category == 6) {
                    $buildingAmenity = new BuildingAmenity();
                    $building_amenity = $request->building_amenity;
                    $building_amenity = explode('|', $building_amenity);
                    foreach ($building_amenity as $key => $dat) {
                        $buildingAmenity->$dat = 1;
                    }
                    $property->buildingAmenity()->save($buildingAmenity);
                }
            }

            /* Property Image */
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            $property_image = new PropertyImage();
            $property_image->images = json_encode($data);
            $property->propertyImage()->save($property_image);

            DB::commit();
            return ResponseHelper::success('Successfully created', Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Fail to request', $e);
        }
    }
    /* Update House , Shop Category = 1 / 6 */
    public function house_shop_update(Request $request)
    {

        $validate = Validator::make($request->all(), [
            /* Address */
            'id' => 'required',
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'building_name' => 'required_if:property_category,==,6',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'floor_level' => 'required_if:property_category,==,6|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* partation */
            'partation_type' => 'required|in:1,2',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required|in:1,2,3',
            'building_condition' => 'required|in:1,2,3',
            'type_of_building' => 'required_if:property_category,==,1|in:1,2',
            'shop_type' => 'required_if:property_category,==,6|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required|in:1,2,3',
            'installment' => 'required_if:property_type,==,1|in:1,0',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2|in:mmk,sg,us',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1|in:mmk,sg,us',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }
        $property = Property::where('user_id', auth()->id())->find($request->id);

        if ($property) {
            DB::beginTransaction();
            try {
                /* Call Id */
                $property = Property::findOrFail($request->id);

                /* Property Store */
                $property->title = $request->title;
                $property->user_id = Auth()->user()->id;
                $property->lat = '112344533'; // Sample lag
                $property->long = '112344533'; // Sample long
                $property->status = config('const.publish'); //Publish Status

                // Address Store
                $property->address->region = $request->region ?? $property->address->region;
                $property->address->township = $request->township ?? $property->address->township;
                $property->address->street_name = $request->street_name ?? null;
                $property->address->ward = $request->ward ?? null;
                $property->address->type_of_street = $request->type_of_street ?? null;
                if ($request->property_category == 6) {
                    $property->address->building_name = $request->building_name;
                }

                /* Area Size Store */
                $property->areasize->area_option = $request->area_option;
                /* Width x length */
                if ($request->area_option == 1) {
                    $property->areasize->width = $request->width;
                    $property->areasize->length = $request->length;
                }
                /** Area */
                if ($request->area_option == 2) {
                    $property->areasize->area_size = $request->area_size;
                    $property->areasize->area_unit = $request->area_unit;
                }
                if ($request->property_category == 6) {
                    $property->areasize->level = $request->floor_level;
                }

                /* Partation Store */
                $property->partation->type = $request->partation_type;
                $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
                $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
                // $property->partation->carpark = $request->carpark ? 1 : 0;

                // Payment Store
                $property->payment->installment = ($request->installment) ? 1 : 0;
                $property->payment->purchase_type = $request->purchase_type;

                // Sale Price Data Store
                if ($property->properties_type == 1) {
                    // Price Store
                    $property->price->price = $request->sale_price;
                    $property->price->area = $request->sale_area;
                    $property->price->price_by_area = $request->sale_price_by_area ?? null;
                    $property->price->currency_code = $request->sale_currency_code;
                }
                // Rent Price Data Store
                if ($property->properties_type == 2) {
                    // Price Store
                    $property->rentprice->price = $request->price;
                    $property->rentprice->area = $request->area;
                    $property->rentprice->price_by_area = $request->price_by_area ?? null;
                    $property->rentprice->currency_code = $request->currency_code;
                    $property->rentprice->minimum_month = $request->minimum_month;
                    $property->rentprice->rent_pay_type = $request->rent_pay_type;
                    $property->rentprice->rent_payby_daily = $request->rent_payby_daily;
                }

                /* Situation Store */
                $property->situation->year_of_construction = $request->year_of_construction;
                $property->situation->building_repairing = $request->building_repairing;
                $property->situation->building_condition = $request->building_condition;
                if ($request->property_category == 1) {
                    $property->situation->type_of_building = $request->type_of_building;
                }
                if ($request->property_category == 6) {
                    $property->situation->shop_type = $request->shop_type;
                }

                /* Electri & water Store */
                // $property->suppliment->water_sys = $request->water ? 1 : 0;
                // $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
                $property->suppliment->note = $request->note ?? null;

                /* Unit Aminity */
                if ($request->unit_amenity) {
                    if ($property->category == 1) {
                        $splice_amenity = $request->unit_amenity;
                        $splice_amenity = explode('|', $splice_amenity);
                        $unit_amenity = config('const.unit_amenity');
                        $unit_amenity_diff = array_diff($unit_amenity, $splice_amenity);
                        $unit_amenity_intersect = array_intersect($unit_amenity, $splice_amenity);
                        if ($unit_amenity_diff) {
                            foreach ($unit_amenity_diff as $key => $diff) {
                                $property->unitAmenity->$diff = 0;
                            }
                        }
                        if ($unit_amenity_intersect) {
                            foreach ($unit_amenity_intersect as $key => $interset) {
                                $property->unitAmenity->$interset = 1;
                            }
                        }
                    }
                }

                /* Building Aminity */
                if ($request->building_amenity) {
                    if ($property->category == 6) {
                        $splice_building_amenity = $request->building_amenity;
                        $splice_building_amenity = explode('|', $splice_building_amenity);
                        $building_amenity = config('const.building_amenity');
                        $building_amenity_diff = array_diff($building_amenity, $splice_building_amenity);
                        $building_amenity_intersect = array_intersect($building_amenity, $splice_building_amenity);
                        if ($building_amenity_diff) {
                            foreach ($building_amenity_diff as $key => $diff) {
                                $property->buildingAmenity->$diff = 0;
                            }
                        }
                        if ($building_amenity_intersect) {
                            foreach ($building_amenity_intersect as $key => $interset) {
                                $property->buildingAmenity->$interset = 1;
                            }
                        }
                    }
                }
                /* Property Image */
                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data_images[] = $file_name;
                    }
                    $decode_images = json_decode($property->propertyImage->images);
                    $result = array_merge($decode_images, $data_images);
                    $property->propertyImage->images = $result;
                }
                // Splice if not img 
                // if ($request->old || $request->photos) {
                //     $old_data = $request->old ?? [];
                //     $count = count($request->file('photos') ?? []);
                //     $data = array_reverse($old_data);
                //     $splice_data = array_splice($data, $count);

                //     // Fetch Old Image
                //     $store_data = $property->propertyImage->first('images');
                //     $store_data = json_decode($store_data['images']);

                //     // Diff image
                //     $collection = collect($store_data);
                //     $diff_image = $collection->diff($splice_data);

                //     // Delete image
                //     if (!$diff_image->all() == []) {
                //         foreach ($diff_image as $key => $diff) {
                //             Storage::disk('public')->delete('property_images/' . $diff);
                //         }
                //     }

                //     // Get Remain Data from coming form
                //     foreach ($splice_data as $image) {
                //         $data[] = $image;
                //     }

                //     // Upload New image
                //     if ($request->hasfile('photos')) {
                //         foreach ($request->file('photos') as $image) {
                //             $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                //             Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                //             $data[] = $file_name;
                //         }
                //     }
                //     // Splice No Need Data
                //     $filtered = array_splice($data, $count);
                //     $property->propertyImage->images = json_encode($filtered);
                // }

                $property->push();


                DB::commit();

                return ResponseHelper::success('Successfully Updated', Null);
            } catch (\Exception $e) {
                DB::rollBack();
                return ResponseHelper::fail('Something Wrong', $e);
            }
        }
        return ResponseHelper::fail('Fail Request', 'you are not own this');
    }
    /* Create Land, House Land , Industrial = Category 2 / 5/ 7 */
    public function land_house_land_create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            /* Address */
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',
            'building_name' => 'required_if:property_category,==,7',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7|in:1,2',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'building_repairing' => 'required|in:1,2,3',
            'fence_condition' => 'required_if:property_category,==,2|in:1,0',
            'land_type' => 'required_if:property_category,==,5|in:1,2,3,4',
            'industrial_type' => 'required_if:property_category,==,7|in:1,2',
            'year_of_construction' => 'required_if:property_category,==,7',
            'building_condition' => 'required_if:property_category,==,7|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required|in:1,2,3',
            'installment' => 'required_if:property_type,==,1|in:1,0',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2|in:mmk,sg,us',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1|in:mmk,sg,us',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

            /* image */
            'images' => 'required'
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->title = $request->title;
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = config('const.publish'); //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name ?? null;
            $address->ward = $request->ward ?? null;
            $address->township = $request->township ?? null;
            $address->type_of_street = $request->type_of_street ?? null;
            if ($property->category == 7) {
                $address->building_name = $request->building_name;
            }
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->area_option = $request->area_option;
            /* Width x length */
            if ($request->area_option == 1) {
                $area_size->width = $request->width;
                $area_size->length = $request->length;
            }
            /** Area */
            if ($request->area_option == 2) {
                $area_size->area_size = $request->area_size;
                $area_size->area_unit = $request->area_unit;
            }
            if ($request->property_category == 6) {
                $area_size->level = $request->floor_level;
            }
            $property->areasize()->save($area_size);

            /* For Industrial */
            if ($property->category == 7) {
                $area_size->building_width = $request->building_width;
                $area_size->building_length = $request->building_length;
            }
            $property->areasize()->save($area_size);

            /* Partation Store if Land for House */
            if ($property->category == 2 || $property->category == 7) {
                $partation = new Partation();
                $partation->type = $request->partation_type;
                $partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
                $partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
                // $partation->carpark = $request->carpark ? 1 : 0;
                $property->partation()->save($partation);
            }

            /* Payment Store */
            $payment = new Payment();
            $payment->installment = ($request->installment) ? 1 : 0;
            $payment->purchase_type = $request->purchase_type;
            $property->payment()->save($payment);

            /* Sale Price Data Store */
            if ($request->property_type == 1) {
                /* Price Store */
                $price = new Price();
                $price->price = $request->sale_price;
                $price->area = $request->sale_area;
                $price->price_by_area = $request->sale_price_by_area ?? null;
                $price->currency_code = $request->sale_currency_code;
                $property->price()->save($price);
            }
            /* Rent Price Data Store */
            if ($request->property_type == 2) {
                /* Price Store */
                $price = new RentPrice();
                $price->price = $request->price;
                $price->area = $request->area;
                $price->price_by_area = $request->price_by_area ?? null;
                $price->currency_code = $request->currency_code;
                $price->minimum_month = $request->minimum_month;
                $price->rent_pay_type = $request->rent_pay_type;
                $price->rent_payby_daily = $request->rent_payby_daily;
                $property->rentprice()->save($price);
            }

            /* Situation Store */
            $situation = new Situation();
            $situation->building_repairing = $request->building_repairing;
            /* Land House */
            if ($property->category == 2) {
                $situation->fence_condition = $request->fence_condition;
            }
            /* Land */
            if ($property->category == 5) {
                $situation->land_type = $request->land_type;
            }
            /* Industrial */
            if ($property->category == 7) {
                $situation->industrial_type = $request->industrial_type;
                $situation->year_of_construction = $request->year_of_construction;
                $situation->building_condition = $request->building_condition;
            }
            $property->situation()->save($situation);

            /* Electri & water Store */
            $suppliment = new Suppliment();
            // $suppliment->water_sys = $request->water ? 1 : 0;
            // $suppliment->electricity_sys = $request->electric ? 1 : 0;
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);

            /* Property Image */
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            $property_image = new PropertyImage();
            $property_image->images = json_encode($data);
            $property->propertyImage()->save($property_image);

            DB::commit();
            return ResponseHelper::success('Successfully Created', null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong', $e);
        }
    }
    /* Update Land, House Land , Industrial = Category 2 / 5/ 7 */
    public function land_house_land_update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            /* Address */
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',
            'building_name' => 'required_if:property_category,==,7',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7|in:1,2',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'building_repairing' => 'required|in:1,2,3',
            'fence_condition' => 'required_if:property_category,==,2|in:1,0',
            'land_type' => 'required_if:property_category,==,5|in:1,2,3,4',
            'industrial_type' => 'required_if:property_category,==,7|in:1,2',
            'year_of_construction' => 'required_if:property_category,==,7',
            'building_condition' => 'required_if:property_category,==,7|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required|in:1,2,3',
            'installment' => 'required_if:property_type,==,1|in:1,0',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }
        $property = Property::where('user_id', auth()->id())->find($request->id);

        if ($property) {
            DB::beginTransaction();
            try {
                /* Property Store */
                $property->title = $request->title;
                $property->user_id = Auth()->user()->id;
                $property->lat = '112344533'; // Sample lag
                $property->long = '112344533'; // Sample long
                $property->status = config('const.publish'); //Publish Status

                /* Address Store */
                $property->address->region = $request->region ?? $property->address->region;
                $property->address->township = $request->township ?? $property->address->township;
                $property->address->street_name = $request->street_name ?? null;
                $property->address->ward = $request->ward ?? null;
                $property->address->type_of_street = $request->type_of_street ?? null;
                if ($property->category == 7) {
                    $property->address->building_name = $request->building_name;
                }

                /* Area Size Store */
                $property->areasize->area_option = $request->area_option;
                /* Width x length */
                if ($request->area_option == 1) {
                    $property->areasize->width = $request->width;
                    $property->areasize->length = $request->length;
                }
                /** Area */
                if ($request->area_option == 2) {
                    $property->areasize->area_size = $request->area_size;
                    $property->areasize->area_unit = $request->area_unit;
                }
                if ($request->property_category == 6) {
                    $property->areasize->level = $request->floor_level;
                }

                /* Partation Store For Land House And Industrial */
                if ($property->category == 2 || $property->category == 7) {
                    $property->partation->type = $request->partation_type;
                    $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
                    $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
                    // $property->partation->carpark = $request->carpark ? 1 : 0;
                }

                /* Payment Store */
                $property->payment->installment = ($request->installment) ? 1 : 0;
                $property->payment->purchase_type = $request->purchase_type;

                /* Sale Price Data Store */
                if ($property->properties_type == 1) {
                    /* Price Store */
                    $property->price->price = $request->sale_price;
                    $property->price->area = $request->sale_area;
                    $property->price->price_by_area = $request->sale_price_by_area ?? null;
                    $property->price->currency_code = $request->sale_currency_code;
                }

                /* Rent Price Data Store */
                if ($property->properties_type == 2) {
                    /* Rent Price Store */
                    $property->rentprice->price = $request->price;
                    $property->rentprice->area = $request->area;
                    $property->rentprice->price_by_area = $request->price_by_area ?? null;
                    $property->rentprice->currency_code = $request->currency_code;
                    $property->rentprice->minimum_month = $request->minimum_month;
                    $property->rentprice->rent_pay_type = $request->rent_pay_type;
                    $property->rentprice->rent_payby_daily = $request->rent_payby_daily;
                }

                /* Situation Store */
                $property->situation->building_repairing = $request->building_repairing;
                if ($property->category == 2) {
                    $property->situation->fence_condition = $request->fence_condition;
                }
                if ($property->category == 5) {
                    $property->situation->land_type = $request->land_type;
                }
                if ($property->category == 7) {
                    $property->situation->year_of_construction = $request->year_of_construction;
                    $property->situation->industrial_type = $request->industrial_type;
                    $property->situation->building_condition = $request->building_condition;
                }

                /* Electri & water Store */
                // $property->suppliment->water_sys = $request->water ? 1 : 0;
                // $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
                $property->suppliment->note = $request->note ?? null;

                /* Property Image */
                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data_images[] = $file_name;
                    }
                    $decode_images = json_decode($property->propertyImage->images);
                    $result = array_merge($decode_images, $data_images);
                    $property->propertyImage->images = $result;
                }
                /* Splice if not image  */
                // if ($request->old || $request->photos) {
                //     $old_data = $request->old ?? [];
                //     $count = count($request->file('photos') ?? []);
                //     $data = array_reverse($old_data);
                //     $splice_data = array_splice($data, $count);

                //     /* Fetch Old Image */
                //     $store_data = $property->propertyImage->first('images');
                //     $store_data = json_decode($store_data['images']);

                //     /* Diff image */
                //     $collection = collect($store_data);
                //     $diff_image = $collection->diff($splice_data);

                //     /* Delete image */
                //     if (!$diff_image->all() == []) {
                //         foreach ($diff_image as $key => $diff) {
                //             Storage::disk('public')->delete('property_images/' . $diff);
                //         }
                //     }

                //     /* Get Remain Data from coming form */
                //     foreach ($splice_data as $image) {
                //         $data[] = $image;
                //     }

                //     /* Upload New image */
                //     if ($request->hasfile('photos')) {
                //         foreach ($request->file('photos') as $image) {
                //             $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                //             Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                //             $data[] = $file_name;
                //         }
                //     }
                //     /* Splice No Need Data */
                //     $filtered = array_splice($data, $count);
                //     $property->propertyImage->images = json_encode($filtered);
                // }

                $property->push();

                DB::commit();

                return ResponseHelper::success('Successfully Updated', Null);
            } catch (\Exception $e) {
                DB::rollBack();
                return ResponseHelper::fail('Something Wrong', $e);
            }
        }
        return ResponseHelper::fail('Fail Request', 'you are not own this');
    }
    /* Create Aparment Condo , Office  Category 3 / 4 / 8 */
    public function apart_condo_office_create(ApartCondoCreateRequest $request)
    {

        $validate = Validator::make($request->all(), [
            /* Address */
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'building_name' => 'required',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'floor_level' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Partation */
            'partation_type' => 'required|in:1,2',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required|in:1,2,3',
            'building_condition' => 'required|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2|in:mmk,sg,us',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

            /* image */
            'images' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->title = $request->title;
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = config('const.publish'); //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name ?? null;
            $address->ward = $request->ward ?? null;
            $address->township = $request->township ?? null;
            $address->type_of_street = $request->type_of_street ?? null;
            $address->building_name = $request->building_name;
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->area_option = $request->area_option;
            /* Width x length */
            if ($request->area_option == 1) {
                $area_size->width = $request->width;
                $area_size->length = $request->length;
            }
            /** Area */
            if ($request->area_option == 2) {
                $area_size->area_size = $request->area_size;
                $area_size->area_unit = $request->area_unit;
            }
            $area_size->level = $request->floor_level;
            $property->areasize()->save($area_size);

            /* Partation Store */
            $partation = new Partation();
            $partation->type = $request->partation_type;
            $partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            // $partation->carpark = $request->carpark;
            $property->partation()->save($partation);

            /* Payment Store */
            $payment = new Payment();
            $payment->installment = ($request->installment) ? 1 : 0;
            $payment->purchase_type = $request->purchase_type;
            $property->payment()->save($payment);

            /* Sale Price Data Store */
            if ($request->property_type == 1) {
                /* Price Store */
                $price = new Price();
                $price->price = $request->sale_price;
                $price->area = $request->sale_area;
                $price->price_by_area = $request->sale_price_by_area ?? null;
                $price->currency_code = $request->sale_currency_code;
                $property->price()->save($price);
            }
            /* Rent Price Data Store */
            if ($request->property_type == 2) {
                /* Rent Price Store */
                $price = new RentPrice();
                $price->price = $request->price;
                $price->area = $request->area;
                $price->price_by_area = $request->price_by_area ?? null;
                $price->currency_code = $request->currency_code;
                $price->minimum_month = $request->minimum_month;
                $price->rent_pay_type = $request->rent_pay_type;
                $price->rent_payby_daily = $request->rent_payby_daily;
                $property->rentprice()->save($price);
            }

            /* Situation Store */
            $situation = new Situation();
            $situation->year_of_construction = $request->year_of_construction;
            $situation->building_repairing = $request->building_repairing;
            $situation->building_condition = $request->building_condition;
            $property->situation()->save($situation);

            /* Electri & water Store */
            $suppliment = new Suppliment();
            // $suppliment->water_sys = $request->water ? 1 : 0;
            // $suppliment->electricity_sys = $request->electric ? 1 : 0;
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);


            /* Unit Aminity */
            if ($request->unit_amenity) {
                $unitAmenity = new UnitAmenity();
                $splice_amenity = $request->unit_amenity;
                $splice_amenity = explode('|', $splice_amenity);
                foreach ($splice_amenity as $key => $dat) {
                    $unitAmenity->$dat = 1;
                }
                $property->unitAmenity()->save($unitAmenity);
            }

            /* Building Amenity */
            if ($request->building_amenity) {
                $buildingAmenity = new BuildingAmenity();
                $building_amenity = $request->building_amenity;
                $building_amenity = explode('|', $building_amenity);
                foreach ($building_amenity as $key => $dat) {
                    $buildingAmenity->$dat = 1;
                }
                $property->buildingAmenity()->save($buildingAmenity);
            }

            /* LotFeature */
            if ($request->lot_feature) {
                $lotFeature = new LotFeature();
                $lot_feature = $request->lot_feature;
                $lot_feature = explode('|', $lot_feature);
                foreach ($lot_feature as $key => $dat) {
                    $lotFeature->$dat = 1;
                }
                $property->lotFeature()->save($lotFeature);
            }


            /* Property Image */
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            $property_image = new PropertyImage();
            $property_image->images = json_encode($data);
            $property->propertyImage()->save($property_image);

            DB::commit();
            return ResponseHelper::success('Successfully Created', Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong', $e);
        }
    }
    /* Update Aparment Condo , Office  Category 3 / 4 / 8 */
    public function apart_condo_office_update(ApartCondoUpdateRequest $request)
    {
        $validate = Validator::make($request->all(), [
            /* Address */
            'property_category' => 'required|in:1,2,3,4,5,6,7,8',
            'title' => 'required',
            'building_name' => 'required',

            /* Area Size */
            'area_option' => 'required|in:1,2',
            'floor_level' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Partation */
            'partation_type' => 'required|in:1,2',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required|in:1,2,3',
            'building_condition' => 'required|in:1,2,3',

            /* Property Type */
            'property_type' => 'required|in:1,2',

            /* Payment */
            'purchase_type' => 'required|in:1,2,3',
            'installment' => 'required_if:property_type,==,1|in:1,0',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2|in:mmk,sg,us',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1|in:mmk,sg,us',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }
        $property = Property::where('user_id', auth()->id())->find($request->id);

        if ($property) {
            DB::beginTransaction();
            try {
                /* Property Store */
                $property->title = $request->title;
                $property->user_id = Auth()->user()->id;
                $property->lat = '112344533'; // Sample lag
                $property->long = '112344533'; // Sample long
                $property->status = config('const.publish'); //Publish Status

                /* Address Store */
                $property->address->region = $request->region ?? $property->address->region;
                $property->address->township = $request->township ?? $property->address->township;
                $property->address->street_name = $request->street_name ?? null;
                $property->address->ward = $request->ward ?? null;
                $property->address->type_of_street = $request->type_of_street ?? null;
                $property->address->building_name = $request->building_name;

                /* Area Size Store */
                $property->areasize->area_option = $request->area_option;
                /* Width x length */
                if ($request->area_option == 1) {
                    $property->areasize->width = $request->width;
                    $property->areasize->length = $request->length;
                }
                /** Area */
                if ($request->area_option == 2) {
                    $property->areasize->area_size = $request->area_size;
                    $property->areasize->area_unit = $request->area_unit;
                }

                $property->areasize->level = $request->floor_level;

                /* Partation Store */
                $property->partation->type = $request->partation_type;
                $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
                $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
                // $property->partation->carpark = $request->carpark;

                /* Payment Store */
                $property->payment->installment = ($request->installment) ? 1 : 0;
                $property->payment->purchase_type = $request->purchase_type ? 1 : 0;

                /* Sale Price Data Store */
                if ($request->property_type == 1) {
                    /* Price Store */
                    $property->price->price = $request->sale_price;
                    $property->price->area = $request->sale_area;
                    $property->price->price_by_area = $request->sale_price_by_area ?? null;
                    $property->price->currency_code = $request->sale_currency_code;
                }
                /* Rent Price Data Store */
                if ($request->property_type == 2) {
                    /* Price Store */
                    $property->rentprice->price = $request->price;
                    $property->rentprice->area = $request->area;
                    $property->rentprice->price_by_area = $request->price_by_area ?? null;
                    $property->rentprice->currency_code = $request->currency_code;
                    $property->rentprice->minimum_month = $request->minimum_month;
                    $property->rentprice->rent_pay_type = $request->rent_pay_type;
                    $property->rentprice->rent_payby_daily = $request->rent_payby_daily;
                }

                /* Situation Store */
                $property->situation->year_of_construction = $request->year_of_construction;
                $property->situation->building_repairing = $request->building_repairing;
                $property->situation->building_condition = $request->building_condition;

                /* Electri & water Store */
                // $property->suppliment->water_sys = $request->water ? 1 : 0;
                // $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
                $property->suppliment->note = $request->note ?? null;

                /* Unit Aminity */
                if ($request->unit_amenity) {
                    $splice_amenity = explode('|', $request->unit_amenity);
                    $unit_amenity = config('const.unit_amenity');
                    $unit_amenity_diff = array_diff($unit_amenity, $splice_amenity);
                    $unit_amenity_intersect = array_intersect($unit_amenity, $splice_amenity);
                    if ($unit_amenity_diff) {
                        foreach ($unit_amenity_diff as $key => $diff) {
                            $property->unitAmenity->$diff = 0;
                        }
                    }
                    if ($unit_amenity_intersect) {
                        foreach ($unit_amenity_intersect as $key => $interset) {
                            $property->unitAmenity->$interset = 1;
                        }
                    }
                }

                /* Building Aminity */
                if ($request->building_amenity) {
                    $splice_building_amenity = explode('|', $request->building_amenity);
                    $building_amenity = config('const.building_amenity');
                    $building_amenity_diff = array_diff($building_amenity, $splice_building_amenity);
                    $building_amenity_intersect = array_intersect($building_amenity, $splice_building_amenity);
                    if ($building_amenity_diff) {
                        foreach ($building_amenity_diff as $key => $diff) {
                            $property->buildingAmenity->$diff = 0;
                        }
                    }
                    if ($building_amenity_intersect) {
                        foreach ($building_amenity_intersect as $key => $interset) {
                            $property->buildingAmenity->$interset = 1;
                        }
                    }
                }

                /* LotFeature */
                if ($request->lot_feature) {
                    $splice_lot_feature = explode('|', $request->lot_feature);
                    $lot_feature = config('const.lot_feature');
                    $lot_feature_diff = array_diff($lot_feature, $splice_lot_feature);
                    $lot_feature_intersect = array_intersect($lot_feature, $splice_lot_feature);
                    if ($lot_feature_diff) {
                        foreach ($lot_feature_diff as $key => $diff) {
                            $property->lotFeature->$diff = 0;
                        }
                    }
                    if ($lot_feature_intersect) {
                        foreach ($lot_feature_intersect as $key => $interset) {
                            $property->lotFeature->$interset = 1;
                        }
                    }
                }
                /* Property Image */
                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data_images[] = $file_name;
                    }
                    $decode_images = json_decode($property->propertyImage->images);
                    $result = array_merge($decode_images, $data_images);
                    $property->propertyImage->images = $result;
                }
                // /* Splice if not img  */
                // if ($request->old || $request->photos) {
                //     $old_data = $request->old ?? [];
                //     $count = count($request->file('photos') ?? []);
                //     $data = array_reverse($old_data);
                //     $splice_data = array_splice($data, $count);

                //     /* Fetch Old Image */
                //     $store_data = $property->propertyImage->first('images');
                //     $store_data = json_decode($store_data['images']);

                //     /* Diff image */
                //     $collection = collect($store_data);
                //     $diff_image = $collection->diff($splice_data);

                //     /* Delete image */
                //     if (!$diff_image->all() == []) {
                //         foreach ($diff_image as $key => $diff) {
                //             Storage::disk('public')->delete('property_images/' . $diff);
                //         }
                //     }

                //     /* Get Remain Data from coming form */
                //     foreach ($splice_data as $image) {
                //         $data[] = $image;
                //     }

                //     /* Upload New image */
                //     if ($request->hasfile('photos')) {
                //         foreach ($request->file('photos') as $image) {
                //             $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                //             Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                //             $data[] = $file_name;
                //         }
                //     }
                //     /* Splice No Need Data */
                //     $filtered = array_splice($data, $count);
                //     $property->propertyImage->images = json_encode($filtered);
                // }

                $property->push();

                DB::commit();
                return ResponseHelper::success('Successfully Updated', Null);
            } catch (\Exception $e) {
                DB::rollBack();
                return ResponseHelper::fail('Something Wrong', $e);
            }
        }
        return ResponseHelper::fail('Fail Request', 'you are not own this');
    }

    public function DeletePropertyImage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'images' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }

        $data = Property::where('user_id', auth()->user()->id)
            ->where('id', $request->id)
            ->first();
        if (!$data) {
            return ResponseHelper::fail('Fail Request', 'Data not found');
        }
        $data_images = $data->propertyImage->images;
        $data_images = json_decode($data_images, true);
        $images = explode(',', $request->images);

        if ($data) {
            foreach ($images as $key => $del) {
                $rev = array_search($del, $data_images);
                if ($rev !== false) {
                    Storage::disk('public')->delete('/property_images/' . $data_images[$rev]);
                    unset($data_images[$rev]);
                }
            }
            $data->propertyImage->images = json_encode(array_values($data_images));
            $data->push();
            return ResponseHelper::success('Success', 'Successfully Deleted');
        }
    }

    public function destroy($id)
    {
        $data = Property::where('user_id', auth('api')->user()->id)
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
}
