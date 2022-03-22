<?php

namespace App\Http\Controllers\Backend;

use App\Price;
use App\Region;
use App\Address;
use App\Payment;
use App\AreaSize;
use App\Property;
use App\Township;
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
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApartCondoCreateRequest;
use App\Http\Requests\ApartCondoUpdateRequest;
use App\Http\Requests\landHouseUpdateRequest;

class PropertyController extends Controller
{
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.property.index', compact('regions'));
    }
    public function ssd(Request $request)
    {
        $data = Property::query()->with([
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
        ]);
        if ($request->get('title')) {
            $data->where('title', $request->get('title'));
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
        if ($request->get('measurement')) {
            $measurement = $request->get('measurement');
            $data->whereHas('areasize', function ($query) use ($measurement) {
                $query->where('measurement', $measurement);
            });
        }
        if ($request->get('front_area')) {
            $front_area = $request->get('front_area');
            $data->whereHas('areasize', function ($query) use ($front_area) {
                $query->where('front_area', $front_area);
            });
        }
        if ($request->get('building_width')) {
            $building_width = $request->get('building_width');
            $data->whereHas('areasize', function ($query) use ($building_width) {
                $query->where('building_width', $building_width);
            });
        }
        if ($request->get('building_length')) {
            $building_length = $request->get('building_length');
            $data->whereHas('areasize', function ($query) use ($building_length) {
                $query->where('building_length', $building_length);
            });
        }
        if ($request->get('fence_width')) {
            $fence_width = $request->get('fence_width');
            $data->whereHas('areasize', function ($query) use ($fence_width) {
                $query->where('fence_width', $fence_width);
            });
        }
        if ($request->get('fence_length')) {
            $fence_length = $request->get('fence_length');
            $data->whereHas('areasize', function ($query) use ($fence_length) {
                $query->where('fence_length', $fence_length);
            });
        }
        if ($request->get('floor_level')) {
            $floor_level = $request->get('floor_level');
            $data->whereHas('areasize', function ($query) use ($floor_level) {
                $query->where('floor_level', $floor_level);
            });
        }
        if ($request->get('height')) {
            $height = $request->get('height');
            $data->whereHas('areasize', function ($query) use ($height) {
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

        if ($request->get('carpark')) {
            $carpark = $request->get('carpark');
            $data->whereHas('partation', function ($query) use ($carpark) {
                $query->where('carpark', $carpark);
            });
        }
        
        if ($request->get('sort')) {
            $sort = $request->get('sort');
            /* Sort By Max Price */
            // if ($sort == 'max') {
            //     if ($request->get('property_type') == 1) {
            //         $data->whereHas('price', function ($query) {
            //             $query->orderBy('price', 'DESC');
            //         });
            //     } else{
            //         $data->whereHas('rentprice', function ($query) {
            //             $query->orderBy('price', 'DESC');
            //         });
            //     }
            // }
            // /* Sort By Min Price */
            // if ($sort == 'min') {
            //     if ($request->get('property_type') == 1) {
            //         $data->whereHas('price', function ($query) {
            //             $query->orderBy('price');
            //         });
            //     } else{
            //         $data->whereHas('rentprice', function ($query) {
            //             $query->orderBy('price', 'ASC');
            //         });
            //     }
            // }
            if ($sort == 'new') {
                $data->orderBy('updated_at', 'DESC');
            }
            if ($sort == 'old') {
                $data->orderBy('updated_at', 'ASC');
            }
        }else{
            $data->orderBy('updated_at', 'DESC');
        }

        return Datatables::of($data)
            ->filterColumn('region', function ($query, $keyword) {
                $query->whereHas('address', function ($qa) use ($keyword) {
                    $qa->whereHas('region', function ($qr) use ($keyword) {
                        $qr->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                });
            })
            ->filterColumn('township', function ($query, $keyword) {
                $query->whereHas('address', function ($qa) use ($keyword) {
                    $qa->whereHas('township', function ($qt) use ($keyword) {
                        $qt->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                });
            })
            ->filterColumn('price', function ($query, $keyword) {
                $query->whereHas('price', function ($qa) use ($keyword) {
                    $qa->where('price', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('title', function ($query, $keyword) {  
                    $query->where('title', 'LIKE', '%' . $keyword . '%');
            })
            ->addColumn('images', function ($each) {
                $image = $each->propertyImage()->first('images');
                $image = json_decode($image['images']);
                if (count($image)) {
                    return '<img style="width: 100px;height:100px;" src="' . asset(config('const.p_img_path')) . '/' . $image[0] . '">' ?? '-';
                }
                return '';
            })
            ->editColumn('title', function ($each) {
                return $each->title;
            })
            ->editColumn('p_code', function ($each) {
                return $each->p_code;
            })
            ->editColumn('region', function ($each) {
                $region = $each->address->region()->first('name');
                return $region->name ?? '-';
            })
            ->editColumn('township', function ($each) {
                $township = $each->address->township()->first('name');
                return $township->name ?? '-';
            })
            ->editColumn('price', function ($each) {
                if ($each->properties_type == 1) {
                    return number_format($each->price->price).' '.config('const.currency_code')[$each->price->currency_code] ?? '-';
                }
                return number_format($each->rentprice->price).' '.config('const.currency_code')[$each->rentprice->currency_code] ?? '-';
            })
            ->editColumn('properties_type', function ($each) {
                return config('const.property_type')[$each->properties_type] ?? '-';
            })
            ->editColumn('category', function ($each) {
                return config('const.property_category')[$each->category] ?? '-';
            })
            ->editColumn('status', function ($each) {
                if ($each->status == 1) {
                    return '<span class="badge badge-pill badge-success">' . config('const.publish_status')[$each->status] . '</span>' ?? '-';
                }
                return '-';
            })
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="' . route('admin.property.edit', $each->id) . '" class="text-warning"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['images', 'status', 'action'])
            ->make(true);
    }
    /* Property Create by Relative */
    public function create(Request $request)
    {
        $regions = Region::get(['name', 'id']);
        $category = $request->property_category;
        $type = $request->property_type;
        if ($category == 1 || $category == 6) {
            return view('backend.property.create.house_shop', compact('regions', 'category', 'type'));
        }
        if ($category == 2 || $category == 5 || $category == 7) {
            return view('backend.property.create.land_house_land', compact('regions', 'category', 'type'));
        }
        if ($category == 3 || $category == 4 || $category == 8) {
            return view('backend.property.create.apartment_condo_office', compact('regions', 'category', 'type'));
        }
        return back();
    }
    /* Create House, Shop */
    public function house_shop_create(Request $request)
    {

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
            return redirect()->route('admin.property.index')->with('create', 'Successfully Created');
        } catch (\Exception $e) {
            DB::rollBack();
            // return $e;
            return back()->withErrors(['fail' => 'Hello Something Wrong'])->withInput();
        }
    }
    /* Update House , Shop */
    public function house_shop_update(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            /* Call Id */
            $property = Property::findOrFail($request->id);
            $property->title = $request->title;
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
            return redirect()->route('admin.property.index')->with('update', 'Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->withErrors(['fail' => 'Hello Something Wrong'])->withInput();
        }
    }
    /* Create Land, House Land , Industrial */
    public function land_house_land_create(Request $request)
    {

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
            return redirect()->route('admin.property.index')->with('create', 'Successfully Created');
        } catch (\Exception $e) {
            DB::rollBack();
            // return $e;
            return back()->withErrors(['fail' => 'Hello Something Wrong'])->withInput();
        }
    }
    /* Update Land, House Land , Industrial */
    public function land_house_land_update(landHouseUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $property = Property::findOrFail($request->id);
            /* Property Store */
            $property->user_id = Auth()->user()->id;
            $property->title = $request->title;
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
            return redirect()->route('admin.property.index')->with('update', 'Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->withErrors(['fail' => 'Something Wrong'])->withInput();
        }
    }
    /* Create Aparment Condo , Office */
    public function apart_condo_office_create(ApartCondoCreateRequest $request)
    {

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
            $property->status = $request->status ? 1 : 0; //Recommended Status
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
            return redirect()->route('admin.property.index')->with('create', 'Successfully Created');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->withErrors(['fail' => 'Hello Something Wrong'])->withInput();
        }
    }
    /* Update Aparment Condo , Office */
    public function apart_condo_office_update(ApartCondoUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $property = Property::findOrFail($request->id);
            // Property Store
            $property->user_id = Auth()->user()->id;
            $property->title = $request->title;
            $property->lat = '112344533'; // Sample lag
            $property->long = '112344533'; // Sample long
            $property->status = $request->status ? 1 : 0; //Publish Status

            // Address Store
            $property->address->region = $request->region ?? $property->address->region;
            $property->address->township = $request->township ?? $property->address->township;
            $property->address->street_name = $request->street_name;
            $property->address->ward = $request->ward;
            $property->address->type_of_street = $request->type_of_street;
            $property->address->building_name = $request->building_name;

            //Area Size Store
            $property->areasize->measurement = $request->measurement;
            $property->areasize->building_width = $request->building_width;
            $property->areasize->building_length = $request->building_length;
            $property->areasize->level = $request->floor_level;

            // Partation Store
            $property->partation->type = $request->partation_type;
            $property->partation->bed_room = ($request->partation_type == 2) ? $request->bed_room : null;
            $property->partation->bath_room = ($request->partation_type == 2) ? $request->bath_room : null;
            $property->partation->carpark = $request->carpark;

            // Payment Store
            $property->payment->installment = ($request->installment) ? 1 : 0;
            $property->payment->purchase_type = $request->purchase_type ? 1 : 0;

            // Sale Price Data Store
            if ($request->property_type == 1) {
                // Price Store
                $property->price->price = $request->sale_price;
                $property->price->area = $request->sale_area;
                $property->price->price_by_area = $request->sale_price_by_area ?? null;
                $property->price->currency_code = $request->sale_currency_code;
            }
            // Rent Price Data Store
            if ($request->property_type == 2) {
                // Price Store
                $property->rentprice->price = $request->price;
                $property->rentprice->area = $request->area;
                $property->rentprice->price_by_area = $request->price_by_area ?? null;
                $property->rentprice->currency_code = $request->currency_code;
                $property->rentprice->minimum_month = $request->minimum_month;
                $property->rentprice->rent_pay_type = $request->rent_pay_type;
                $property->rentprice->rent_payby_daily = $request->rent_payby_daily;
            }

            // Situation Store
            $property->situation->year_of_construction = $request->year_of_construction;
            $property->situation->building_repairing = $request->building_repairing;
            $property->situation->building_condition = $request->building_condition;

            // Electri & water Store
            $property->suppliment->water_sys = $request->water ? 1 : 0;
            $property->suppliment->electricity_sys = $request->electric ? 1 : 0;
            $property->suppliment->note = $request->note ?? null;

            // Unit Aminity
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
            return redirect()->route('admin.property.index')->with('update', 'Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->withErrors(['fail' => 'Hello Something Wrong'])->withInput();
        }
    }
    /* Property Edit By relative */
    public function edit(Request $request, $id)
    {
        /* Get Region */
        $regions = Region::get(['name', 'id']);

        /* Get Property */
        $property = Property::findOrFail($id);
        $category = $property->category;

        /* Get Image */
        $data = $property->propertyImage()->first('images');
        $decode_images = json_decode($data['images']);
        $images = [];
        foreach ($decode_images as $key => $image) {
            $images[] = [
                'id' => $image,
                'src' => asset(config('const.p_img_path')) . '/' . $image
            ];
        }
        $images = json_encode($images);

        /* Redirect to Edit Page By Relative */
        /* House , Shoop */
        if ($category == 1 || $category == 6) {
            return view('backend.property.edit.house_shop', compact('id', 'property', 'regions', 'category', 'images'));
        }
        /* Land , House Land , Industiral */
        if ($category == 2 || $category == 5 || $category == 7) {
            return view('backend.property.edit.landhouse_land', compact('id', 'property', 'regions', 'category', 'images'));
        }
        /* Aparment Condo and Office */
        if ($category == 3 || $category == 4 || $category == 8) {
            return view('backend.property.edit.apartment_condo_office', compact('id', 'property', 'regions', 'category', 'images'));
        }

        return redirect()->back();
    }
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('admin.property.index')->with('delete', 'Successfully Deleted');
    }
    public function township(Request $request)
    {
        $data['township'] = Township::where("region_id", $request->region_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
