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
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PropertyDetail16;
use App\Http\Resources\PropertyDetail257;
use App\Http\Resources\PropertyDetail348;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\landHouseUpdateRequest;
use App\Http\Requests\ApartCondoCreateRequest;
use App\Http\Requests\ApartCondoUpdateRequest;
use phpDocumentor\Reflection\Types\Null_;

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
            'rentPrice',
            'propertyImage',
        ])->where('user_id',Auth()->user()->id);
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


        return ResponseHelper::success('Success',PropertyList::collection($data));


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
        ])->where('id',$id)->where('user_id',Auth()->user()->id)->first();
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

    /* Create House, Shop */
    public function house_shop_create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'region' => 'required',
            'township' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,6',

            /* Area Size */
            'measurement' => 'required',
            'front_area' => 'required',
            'building_width' => 'required',
            'building_length' => 'required',
            'fence_width' => 'required_if:property_category,==,1',
            'fence_length' => 'required_if:property_category,==,1',
            'floor_level' => 'required_if:property_category,==,6',

            /* Partation */
            'partation_type' => 'required',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required',
            'building_condition' => 'required',
            'type_of_building' => 'required_if:property_category,==,1',
            'shop_type' => 'required_if:property_category,==,6',

            /* Property Type */
            'property_type' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',
            
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

            /* Image */
            'images' => 'required',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth()->user()->id;
            $property->lat = $request->lat ?? Null; // Sample lag
            $property->long = $request->long ?? Null;
             // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = $request->status ? 1 : 0; //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name;
            $address->ward = $request->ward;
            $address->township = $request->township;
            $address->type_of_street = $request->type_of_street;
            if ($request->property_category == 6) {
                $address->building_name = $request->building_name;
            }
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->measurement = $request->measurement;
            $area_size->front_area = $request->front_area;
            $area_size->building_width = $request->building_width;
            $area_size->building_length = $request->building_length;
            if ($request->property_category == 1) {
                $area_size->fence_width = $request->fence_width;
                $area_size->fence_length = $request->fence_length;
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
            $partation->carpark = $request->carpark ? 1 : 0;
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
            $suppliment->water_sys = $request->water ? 1 : 0;
            $suppliment->electricity_sys = $request->electric ? 1 : 0;
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);

            /* Unit Aminity */
            if ($request->property_category == 1) {
                $unitAmenity = new UnitAmenity();
                $unitAmenity->refrigerator = $request->refrigerator ? 1 : 0;
                $unitAmenity->washing_machine = $request->washing_machine ? 1 : 0;
                $unitAmenity->mirowave = $request->mirowave ? 1 : 0;
                $unitAmenity->gas_or_electric_stove = $request->gas_or_electric_stove ? 1 : 0;
                $unitAmenity->air_conditioning = $request->air_conditioning ? 1 : 0;
                $unitAmenity->tv = $request->tv ? 1 : 0;
                $unitAmenity->cable_satellite = $request->cable_satellite ? 1 : 0;
                $unitAmenity->internet_wifi = $request->internet_wifi ? 1 : 0;
                $unitAmenity->water_heater = $request->water_heater ? 1 : 0;
                $unitAmenity->security_cctv = $request->security_cctv ? 1 : 0;
                $unitAmenity->fire_alarm = $request->fire_alarm ? 1 : 0;
                $unitAmenity->dinning_table = $request->dinning_table ? 1 : 0;
                $unitAmenity->bed = $request->bed ? 1 : 0;
                $unitAmenity->sofa_chair = $request->sofa_chair ? 1 : 0;
                $unitAmenity->private_swimming_pool = $request->private_swimming_pool ? 1 : 0;
                $property->unitAmenity()->save($unitAmenity);
            }

            /* Building Amenity */
            if ($request->property_category == 6) {
                $buildingAmenity = new BuildingAmenity();
                $buildingAmenity->elevator = $request->elevator ? 1 : 0;
                $buildingAmenity->garage = $request->garage ? 1 : 0;
                $buildingAmenity->fitness_center = $request->fitness_center ? 1 : 0;
                $buildingAmenity->security = $request->security ? 1 : 0;
                $buildingAmenity->swimming_pool = $request->swimming_pool ? 1 : 0;
                $buildingAmenity->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
                $buildingAmenity->playground = $request->playground ? 1 : 0;
                $buildingAmenity->garden = $request->garden ? 1 : 0;
                $buildingAmenity->carpark = $request->carpark ? 1 : 0;
                $buildingAmenity->own_transformer = $request->own_transformer ? 1 : 0;
                $buildingAmenity->disposal = $request->disposal ? 1 : 0;
                $property->buildingAmenity()->save($buildingAmenity);
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
            return ResponseHelper::success('Successfully created',Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Fail to request',Null);
        }
    }
    /* Update House , Shop */
    public function house_shop_update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,6',
            
            /* AreaSize */
            'measurement' => 'required',
            'front_area' => 'required',
            'building_width' => 'required',
            'building_length' => 'required',
            'fence_width' => 'required_if:property_category,==,1',
            'fence_length' => 'required_if:property_category,==,1',
            'floor_level' => 'required_if:property_category,==,6',
            
            /* partation */
            'partation_type' => 'required',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required',
            'building_condition' => 'required',
            'type_of_building' => 'required_if:property_category,==,1',
            'shop_type' => 'required_if:property_category,==,6',
            
            /* Property Type */
            'property_type' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

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

            /* image */
            'images' => 'required',
        ]);
        
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Call Id */
            $property = Property::findOrFail($request->id);

            /* Property Store */
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->status = $request->status ? 1 : 0; //Publish Status

            // Address Store
            $property->address->region = $request->region ?? $property->address->region;
            $property->address->township = $request->township ?? $property->address->township;
            $property->address->street_name = $request->street_name;
            $property->address->ward = $request->ward;
            $property->address->type_of_street = $request->type_of_street;
            if ($request->property_category == 6) {
                $property->address->building_name = $request->building_name;
            }

            /* Area Size Store */
            $property->areasize->measurement = $request->measurement;
            $property->areasize->front_area = $request->front_area;
            $property->areasize->building_width = $request->building_width;
            $property->areasize->building_length = $request->building_length;
            if ($request->property_category == 1) {
                $property->areasize->fence_width = $request->fence_width;
                $property->areasize->fence_length = $request->fence_length;
            } else {
                $property->areasize->level = $request->floor_level;
            }

            /* Partation Store */
            $property->partation->type = $request->partation_type;
            $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            $property->partation->carpark = $request->carpark ? 1 : 0;

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
            $property->suppliment->water_sys = $request->water ? 1 : 0;
            $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
            $property->suppliment->note = $request->note ?? null;

            /* Unit Aminity */
            if ($property->category == 1) {
                $property->unitAmenity->refrigerator = $request->refrigerator ? 1 : 0;
                $property->unitAmenity->washing_machine = $request->washing_machine ? 1 : 0;
                $property->unitAmenity->mirowave = $request->mirowave ? 1 : 0;
                $property->unitAmenity->gas_or_electric_stove = $request->gas_or_electric_stove ? 1 : 0;
                $property->unitAmenity->air_conditioning = $request->air_conditioning ? 1 : 0;
                $property->unitAmenity->tv = $request->tv ? 1 : 0;
                $property->unitAmenity->cable_satellite = $request->cable_satellite ? 1 : 0;
                $property->unitAmenity->internet_wifi = $request->internet_wifi ? 1 : 0;
                $property->unitAmenity->water_heater = $request->water_heater ? 1 : 0;
                $property->unitAmenity->security_cctv = $request->security_cctv ? 1 : 0;
                $property->unitAmenity->fire_alarm = $request->fire_alarm ? 1 : 0;
                $property->unitAmenity->dinning_table = $request->dinning_table ? 1 : 0;
                $property->unitAmenity->bed = $request->bed ? 1 : 0;
                $property->unitAmenity->sofa_chair = $request->sofa_chair ? 1 : 0;
                $property->unitAmenity->private_swimming_pool = $request->private_swimming_pool ? 1 : 0;
            }

            /* Building Aminity */
            if ($property->category == 6) {
                $property->buildingAmenity->elevator = $request->elevator ? 1 : 0;
                $property->buildingAmenity->garage = $request->garage ? 1 : 0;
                $property->buildingAmenity->fitness_center = $request->fitness_center ? 1 : 0;
                $property->buildingAmenity->security = $request->security ? 1 : 0;
                $property->buildingAmenity->swimming_pool = $request->swimming_pool ? 1 : 0;
                $property->buildingAmenity->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
                $property->buildingAmenity->playground = $request->playground ? 1 : 0;
                $property->buildingAmenity->garden = $request->garden ? 1 : 0;
                $property->buildingAmenity->carpark = $request->carpark ? 1 : 0;
                $property->buildingAmenity->own_transformer = $request->own_transformer ? 1 : 0;
                $property->buildingAmenity->disposal = $request->disposal ? 1 : 0;
            }


            // Splice if not img 
            if ($request->old || $request->photos) {
                $old_data = $request->old ?? [];
                $count = count($request->file('photos') ?? []);
                $data = array_reverse($old_data);
                $splice_data = array_splice($data, $count);

                // Fetch Old Image
                $store_data = $property->propertyImage->first('images');
                $store_data = json_decode($store_data['images']);

                // Diff image
                $collection = collect($store_data);
                $diff_image = $collection->diff($splice_data);

                // Delete image
                if (!$diff_image->all() == []) {
                    foreach ($diff_image as $key => $diff) {
                        Storage::disk('public')->delete('property_images/' . $diff);
                    }
                }

                // Get Remain Data from coming form
                foreach ($splice_data as $image) {
                    $data[] = $image;
                }

                // Upload New image
                if ($request->hasfile('photos')) {
                    foreach ($request->file('photos') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data[] = $file_name;
                    }
                }
                // Splice No Need Data
                $filtered = array_splice($data, $count);
                $property->propertyImage->images = json_encode($filtered);
            }

            $property->push();

            DB::commit();

            return ResponseHelper::success('Successfully Updated',Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong',NUll);
        }
    }
    /* Create Land, House Land , Industrial */
    public function land_house_land_create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'region' => 'required',
            'township' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,7',

            /* AreaSize */
            'measurement' => 'required',
            'front_area' => 'required',
            'fence_width' => 'required',
            'fence_length' => 'required',
            'building_width' => 'required_if:property_category,==,7',
            'building_length' => 'required_if:property_category,==,7',
            
            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'building_repairing' => 'required',
            'fence_condition' => 'required_if:property_category,==,2',
            'land_type' => 'required_if:property_category,==,5',
            'industrial_type' => 'required_if:property_category,==,7',
            'year_of_construction' => 'required_if:property_category,==,7',
            'building_condition' => 'required_if:property_category,==,7',

            /* Property Type */
            'property_type' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

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

            /* image */
            'images' => 'required'
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = $request->status ? 1 : 0; //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name;
            $address->ward = $request->ward;
            $address->township = $request->township;
            $address->type_of_street = $request->type_of_street;
            if ($property->category == 7) {
                $address->building_name = $request->building_name;
            }
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->measurement = $request->measurement;
            $area_size->front_area = $request->front_area;
            $area_size->fence_width = $request->fence_width;
            $area_size->fence_length = $request->fence_length;
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
                $partation->carpark = $request->carpark ? 1 : 0;
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
            $suppliment->water_sys = $request->water ? 1 : 0;
            $suppliment->electricity_sys = $request->electric ? 1 : 0;
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
            return ResponseHelper::success('Successfully Created',null);

        } catch (\Exception $e) {

            DB::rollBack();
            return ResponseHelper::fail('Something Wrong',null);
        }
    }
    /* Update Land, House Land , Industrial */
    public function land_house_land_update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,7',
            
            /* AreaSize */
            'measurement' => 'required',
            'front_area' => 'required',
            'fence_width' => 'required',
            'fence_length' => 'required',
            'building_width' => 'required_if:property_category,==,7',
            'building_length' => 'required_if:property_category,==,7',
            
            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'building_repairing' => 'required',
            'fence_condition' => 'required_if:property_category,==,2',
            'land_type' => 'required_if:property_category,==,5',
            'industrial_type' => 'required_if:property_category,==,7',
            'year_of_construction' => 'required_if:property_category,==,7',
            'building_condition' => 'required_if:property_category,==,7',
            
            /* Property Type */
            'property_type' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

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
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }
        DB::beginTransaction();
        try {
            $property = Property::findOrFail($request->id);
            /* Property Store */
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->status = $request->status ? 1 : 0; //Publish Status

            /* Address Store */
            $property->address->region = $request->region ?? $property->address->region;
            $property->address->township = $request->township ?? $property->address->township;
            $property->address->street_name = $request->street_name;
            $property->address->ward = $request->ward;
            $property->address->type_of_street = $request->type_of_street;
            if ($property->category == 7) {
                $property->address->building_name = $request->building_name;
            }

            /* Area Size Store */
            $property->areasize->measurement = $request->measurement;
            $property->areasize->front_area = $request->front_area;
            $property->areasize->fence_width = $request->fence_width;
            $property->areasize->fence_length = $request->fence_length;
            if ($property->category == 7) {
                $property->areasize->building_width = $request->building_width;
                $property->areasize->building_length = $request->building_length;
            }

            /* Partation Store For Land House And Industrial */
            if ($property->category == 2 || $property->category == 7) {
                $property->partation->type = $request->partation_type;
                $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
                $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
                $property->partation->carpark = $request->carpark ? 1 : 0;
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
            $property->suppliment->water_sys = $request->water ? 1 : 0;
            $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
            $property->suppliment->note = $request->note ?? null;

            /* Splice if not image  */
            if ($request->old || $request->photos) {
                $old_data = $request->old ?? [];
                $count = count($request->file('photos') ?? []);
                $data = array_reverse($old_data);
                $splice_data = array_splice($data, $count);

                /* Fetch Old Image */
                $store_data = $property->propertyImage->first('images');
                $store_data = json_decode($store_data['images']);

                /* Diff image */
                $collection = collect($store_data);
                $diff_image = $collection->diff($splice_data);

                /* Delete image */
                if (!$diff_image->all() == []) {
                    foreach ($diff_image as $key => $diff) {
                        Storage::disk('public')->delete('property_images/' . $diff);
                    }
                }

                /* Get Remain Data from coming form */
                foreach ($splice_data as $image) {
                    $data[] = $image;
                }

                /* Upload New image */
                if ($request->hasfile('photos')) {
                    foreach ($request->file('photos') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data[] = $file_name;
                    }
                }
                /* Splice No Need Data */
                $filtered = array_splice($data, $count);
                $property->propertyImage->images = json_encode($filtered);
            }

            $property->push();

            DB::commit();

            return ResponseHelper::success('Successfully Updated',Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong', Null);
        }
    }
    /* Create Aparment Condo , Office */
    public function apart_condo_office_create(ApartCondoCreateRequest $request)
    {

        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'region' => 'required',
            'township' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required',

            /* AreaSize */
            'measurement' => 'required',
            'building_width' => 'required',
            'building_length' => 'required',
            'floor_level' => 'required',

            /* Partation */
            'partation_type' => 'required',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required',
            'building_condition' => 'required',
            
            /* Property Type */
            'property_type' => 'required',
            
            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

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

            /* image */
            'images' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }

        DB::beginTransaction();
        try {
            /* Property Store */
            $property = new Property();
            $property->p_code = UUIDGenerate::pCodeGenerator();
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->properties_type = $request->property_type;
            $property->category = $request->property_category;
            $property->status = $request->status ? 1 : 0; //Publish Status
            $property->save();

            /* Address Store */
            $address = new Address();
            $address->region = $request->region;
            $address->street_name = $request->street_name;
            $address->ward = $request->ward;
            $address->township = $request->township;
            $address->type_of_street = $request->type_of_street;
            $address->building_name = $request->building_name;
            $property->address()->save($address);

            /* Area Size Store */
            $area_size = new AreaSize();
            $area_size->measurement = $request->measurement;
            $area_size->building_width = $request->building_width;
            $area_size->building_length = $request->building_length;
            $area_size->level = $request->floor_level;
            $property->areasize()->save($area_size);

            /* Partation Store */
            $partation = new Partation();
            $partation->type = $request->partation_type;
            $partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            $partation->carpark = $request->carpark;
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
            $suppliment->water_sys = $request->water ? 1 : 0;
            $suppliment->electricity_sys = $request->electric ? 1 : 0;
            $suppliment->note = $request->note ?? null;
            $property->suppliment()->save($suppliment);

            /* Unit Aminity */
            $unitAmenity = new UnitAmenity();
            $unitAmenity->refrigerator = $request->refrigerator ? 1 : 0;
            $unitAmenity->washing_machine = $request->washing_machine ? 1 : 0;
            $unitAmenity->mirowave = $request->mirowave ? 1 : 0;
            $unitAmenity->gas_or_electric_stove = $request->gas_or_electric_stove ? 1 : 0;
            $unitAmenity->air_conditioning = $request->air_conditioning ? 1 : 0;
            $unitAmenity->tv = $request->tv ? 1 : 0;
            $unitAmenity->cable_satellite = $request->cable_satellite ? 1 : 0;
            $unitAmenity->internet_wifi = $request->internet_wifi ? 1 : 0;
            $unitAmenity->water_heater = $request->water_heater ? 1 : 0;
            $unitAmenity->security_cctv = $request->security_cctv ? 1 : 0;
            $unitAmenity->fire_alarm = $request->fire_alarm ? 1 : 0;
            $unitAmenity->dinning_table = $request->dinning_table ? 1 : 0;
            $unitAmenity->bed = $request->bed ? 1 : 0;
            $unitAmenity->sofa_chair = $request->sofa_chair ? 1 : 0;
            $unitAmenity->private_swimming_pool = $request->private_swimming_pool ? 1 : 0;
            $property->unitAmenity()->save($unitAmenity);

            /* Building Amenity */
            $buildingAmenity = new BuildingAmenity();
            $buildingAmenity->elevator = $request->elevator ? 1 : 0;
            $buildingAmenity->garage = $request->garage ? 1 : 0;
            $buildingAmenity->fitness_center = $request->fitness_center ? 1 : 0;
            $buildingAmenity->security = $request->security ? 1 : 0;
            $buildingAmenity->swimming_pool = $request->swimming_pool ? 1 : 0;
            $buildingAmenity->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
            $buildingAmenity->playground = $request->playground ? 1 : 0;
            $buildingAmenity->garden = $request->garden ? 1 : 0;
            $buildingAmenity->carpark = $request->carpark ? 1 : 0;
            $buildingAmenity->own_transformer = $request->own_transformer ? 1 : 0;
            $buildingAmenity->disposal = $request->disposal ? 1 : 0;
            $property->buildingAmenity()->save($buildingAmenity);


            /* Lot Feature */
            $lotFeature = new LotFeature();
            $lotFeature->cornet_lot = $request->cornet_lot ? 1 : 0;
            $lotFeature->garden = $request->view_garden ? 1 : 0;
            $lotFeature->lake = $request->view_lake ? 1 : 0;
            $lotFeature->mountain = $request->view_mountain ? 1 : 0;
            $lotFeature->river = $request->view_river ? 1 : 0;
            $lotFeature->pool = $request->view_pool ? 1 : 0;
            $lotFeature->sea = $request->view_sea ? 1 : 0;
            $lotFeature->city = $request->view_city ? 1 : 0;
            $lotFeature->pagoda = $request->view_pagoda ? 1 : 0;
            $property->lotFeature()->save($lotFeature);

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
            return ResponseHelper::success('Successfully Created',Null);

        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong',Null);
        }
    }
    /* Update Aparment Condo , Office */
    public function apart_condo_office_update(ApartCondoUpdateRequest $request)
    {
        $validate = Validator::make($request->all(),[
            /* Address */
            'property_category' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required',

            /* AreaSize */
            'measurement' => 'required',
            'building_width' => 'required',
            'building_length' => 'required',
            'floor_level' => 'required',

            /* Partation */
            'partation_type' => 'required',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required',
            'building_condition' => 'required',
            
            /* Property Type */
            'property_type' => 'required',
            
            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

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
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }
        DB::beginTransaction();
        try {
            $property = Property::findOrFail($request->id);
            /* Property Store */
            $property->user_id = Auth()->user()->id;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->status = $request->status ? 1 : 0; //Publish Status

            /* Address Store */
            $property->address->region = $request->region ?? $property->address->region;
            $property->address->township = $request->township ?? $property->address->township;
            $property->address->street_name = $request->street_name;
            $property->address->ward = $request->ward;
            $property->address->type_of_street = $request->type_of_street;
            $property->address->building_name = $request->building_name;

            /* Area Size Store */
            $property->areasize->measurement = $request->measurement;
            $property->areasize->building_width = $request->building_width;
            $property->areasize->building_length = $request->building_length;
            $property->areasize->level = $request->floor_level;

            /* Partation Store */
            $property->partation->type = $request->partation_type;
            $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            $property->partation->carpark = $request->carpark;

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
            $property->suppliment->water_sys = $request->water ? 1 : 0;
            $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
            $property->suppliment->note = $request->note ?? null;

            /* Unit Aminity */
            $property->unitAmenity->refrigerator = $request->refrigerator ? 1 : 0;
            $property->unitAmenity->washing_machine = $request->washing_machine ? 1 : 0;
            $property->unitAmenity->mirowave = $request->mirowave ? 1 : 0;
            $property->unitAmenity->gas_or_electric_stove = $request->gas_or_electric_stove ? 1 : 0;
            $property->unitAmenity->air_conditioning = $request->air_conditioning ? 1 : 0;
            $property->unitAmenity->tv = $request->tv ? 1 : 0;
            $property->unitAmenity->cable_satellite = $request->cable_satellite ? 1 : 0;
            $property->unitAmenity->internet_wifi = $request->internet_wifi ? 1 : 0;
            $property->unitAmenity->water_heater = $request->water_heater ? 1 : 0;
            $property->unitAmenity->security_cctv = $request->security_cctv ? 1 : 0;
            $property->unitAmenity->fire_alarm = $request->fire_alarm ? 1 : 0;
            $property->unitAmenity->dinning_table = $request->dinning_table ? 1 : 0;
            $property->unitAmenity->bed = $request->bed ? 1 : 0;
            $property->unitAmenity->sofa_chair = $request->sofa_chair ? 1 : 0;
            $property->unitAmenity->private_swimming_pool = $request->private_swimming_pool ? 1 : 0;

            /* Building Amenity */
            $property->buildingAmenity->elevator = $request->elevator ? 1 : 0;
            $property->buildingAmenity->garage = $request->garage ? 1 : 0;
            $property->buildingAmenity->fitness_center = $request->fitness_center ? 1 : 0;
            $property->buildingAmenity->security = $request->security ? 1 : 0;
            $property->buildingAmenity->swimming_pool = $request->swimming_pool ? 1 : 0;
            $property->buildingAmenity->spa_hot_tub = $request->spa_hot_tub ? 1 : 0;
            $property->buildingAmenity->playground = $request->playground ? 1 : 0;
            $property->buildingAmenity->garden = $request->garden ? 1 : 0;
            $property->buildingAmenity->carpark = $request->carpark ? 1 : 0;
            $property->buildingAmenity->own_transformer = $request->own_transformer ? 1 : 0;
            $property->buildingAmenity->disposal = $request->disposal ? 1 : 0;


            /* Lot Feature */
            $property->lotFeature->cornet_lot = $request->cornet_lot ? 1 : 0;
            $property->lotFeature->garden = $request->view_garden ? 1 : 0;
            $property->lotFeature->lake = $request->view_lake ? 1 : 0;
            $property->lotFeature->mountain = $request->view_mountain ? 1 : 0;
            $property->lotFeature->river = $request->view_river ? 1 : 0;
            $property->lotFeature->pool = $request->view_pool ? 1 : 0;
            $property->lotFeature->sea = $request->view_sea ? 1 : 0;
            $property->lotFeature->city = $request->view_city ? 1 : 0;
            $property->lotFeature->pagoda = $request->view_pagoda ? 1 : 0;

            /* Splice if not img  */
            if ($request->old || $request->photos) {
                $old_data = $request->old ?? [];
                $count = count($request->file('photos') ?? []);
                $data = array_reverse($old_data);
                $splice_data = array_splice($data, $count);

                /* Fetch Old Image */
                $store_data = $property->propertyImage->first('images');
                $store_data = json_decode($store_data['images']);

                /* Diff image */
                $collection = collect($store_data);
                $diff_image = $collection->diff($splice_data);

                /* Delete image */
                if (!$diff_image->all() == []) {
                    foreach ($diff_image as $key => $diff) {
                        Storage::disk('public')->delete('property_images/' . $diff);
                    }
                }

                /* Get Remain Data from coming form */
                foreach ($splice_data as $image) {
                    $data[] = $image;
                }

                /* Upload New image */
                if ($request->hasfile('photos')) {
                    foreach ($request->file('photos') as $image) {
                        $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                        Storage::disk('public')->put('/property_images/' . $file_name, file_get_contents($image));
                        $data[] = $file_name;
                    }
                }
                /* Splice No Need Data */
                $filtered = array_splice($data, $count);
                $property->propertyImage->images = json_encode($filtered);
            }

            $property->push();

            DB::commit();
            return ResponseHelper::success('Successfully Updated',Null);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::fail('Something Wrong',Null);
        }
    }
}
