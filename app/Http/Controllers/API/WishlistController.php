<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\WishList;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\PropertyWishlist;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $wishlists = auth()->user()->wishlist;
        $property_id = Arr::pluck($wishlists, 'property_id');

        $data = Property::query()->with([
            'address',
            'partation',
            'price',
            'rentPrice',
            'propertyImage',
            'wishlist',
        ])->whereIn('id',$property_id);
        // if ($request->get('category')) {
        //     $data->where('category', $request->get('category'));
        // }
        // if ($request->get('property_type')) {
        //     $data->where('properties_type', $request->get('property_type'));
        // }
        // if ($request->get('region')) {
        //     $region = $request->get('region');
        //     $data->whereHas('address', function ($query) use ($region) {
        //         $query->where('region', $region);
        //     });
        // }
        // if ($request->get('township')) {
        //     $township = $request->get('township');
        //     $data->whereHas('address', function ($query) use ($township) {
        //         $query->where('township', $township);
        //     });
        // }
        
        $data =  $data->orderBy('created_at','DESC')->paginate(10);
        $data = PropertyWishlist::collection($data)->additional(['result'=>true,'message'=>'Success']);
        return $data;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'property_id' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::fail('Fail to request',$validator->errors());
        }
        $status = WishList::where('user_id', Auth::user()->id)
            ->where('property_id', $request->property_id)
            ->first();
        if (isset($status->user_id) and isset($request->property_id)) {
            return ResponseHelper::fail('Fail' ,'This item is already in your wishlist!');
        } else {
            $wishlist = new WishList;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->property_id = $request->property_id;
            $wishlist->save();

            return ResponseHelper::success('success' ,'Added to your wishlist');
        }
    }
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return ResponseHelper::success('success' ,'The item removed from your wishlist');
    }
}
