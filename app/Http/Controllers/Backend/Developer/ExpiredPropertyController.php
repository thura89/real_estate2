<?php

namespace App\Http\Controllers\Backend\Developer;

use App\Region;
use App\Property;
use App\Township;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExpiredPropertyController extends Controller
{
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.developer.expired_property.index', compact('regions'));
    }
    public function ssd(Request $request)
    {
        $date = Carbon::today()->subMonths(12);
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
        ])->whereDate('created_at', '<=', $date)
          ->where('user_id', Auth::user()->id)
          ->where('status',config('const.publish'));//published Status;
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
            $data->where('title', 'LIKE', "%$title%");
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
        
        if ($request->get('sorter')) {
            $sort = $request->get('sorter');
            $type = $request->get('type');
            /* Sort By Max Price */
            if ($sort == 'max') {
                if ($type == 1) {
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
                if ($type == 1) {
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
                return Str::limit($each->title, 20, '...');
            
            })
            ->editColumn('p_code', function ($each) {
                return $each->p_code;
            })
            ->editColumn('region', function ($each) {
                $region = $each->address->region()->first('name');
                return Str::before($region->name,'Region','State') ?? '-';
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
                    return '<span class="badge badge-pill badge-success">' . config('const.recommend_status')[$each->status] . '</span>' ?? '-';
                }
                return '<span class="badge badge-pill badge-warning">' . config('const.recommend_status')[0] . '</span>' ?? '-';
            })
            ->editColumn('expired_at', function ($each) {
                return '<span class="badge badge-pill badge-danger">Expired</span>' ?? '-';
            })
            ->editColumn('created_at', function ($each) {
                return $each->created_at->diffForHumans();
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '<a href="" data-id="' . $each->id . '" class="expired badge badge-pill badge-info text-white" data-toggle="tooltip" data-placement="top" title="Renew">Renew</a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['expired_at','images', 'status', 'action'])
            ->make(true);
    }
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('developer.expired_property.index')->with('delete', 'Successfully Deleted');
    }
    public function expired($id)
    {
        $property = Property::findOrFail($id);
        $property->created_at = Carbon::now();
        $property->update();
        return redirect()->route('developer.expired_property.index')->with('delete', 'Successfully Extended');
    }
    public function township(Request $request)
    {
        $data['township'] = Township::where("region_id", $request->region_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
