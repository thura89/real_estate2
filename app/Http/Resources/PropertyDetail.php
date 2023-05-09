<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $data = [];
        /** Area Size */
        if ($this->areasize->area_option == 1) {
            $data_area_size = [
                'area_option' => $this->areasize ? $this->areasize->area_option : null,
                'width' => $this->areasize ? $this->areasize->width : null,
                'length' => $this->areasize ? $this->areasize->length : null,
            ];
        } else {
            $data_area_size = [
                'area_option' => $this->areasize ? $this->areasize->area_option : null,
                'area_size' => $this->areasize ? $this->areasize->area_size : null,
                'area_unit' => $this->areasize ? $this->areasize->area_unit : null,
            ];
        }

        /* Address */
        $region = $this->address ? $this->address->region : null;
        $township = $this->address ? $this->address->township : null;

        $data['title'] = $this->title;
        $data['address'] = [
            'township' => (string)$township ?? null,
            'region' => (string)$region ?? null,
        ];
        $data['category'] = (string)$this->category;
        $data['properties_type'] = (string)$this->properties_type;
        $data['p_code'] = (string)$this->p_code;

        /* AreaSize */
        $data['area_size'] = $data_area_size;
        if ($this->category == 3 || $this->category == 4 || $this->category == 6 || $this->category == 8) {
            $data['floor_level'] = $this->areasize ? $this->areasize->floor_level : null;
        }

        /* partation */
        $data['bath_room'] = $this->partation ? $this->partation->bath_room : null;
        $data['bed_room'] = $this->partation ? $this->partation->bed_room : null;

        /** Price */
        $data['price'] = $this->price ? (string)$this->price->price : null;
        $data['currency_code'] = $this->price ? $this->price->currency_code : null;

        /* Situation */
        $data['repairing'] = $this->situation ? (string)$this->situation->building_repairing : null;
        $data['condition'] = $this->situation ? (string)$this->situation->building_condition : null;

        /* Get Image */
        if ($this->propertyImage) {
            $img_data = $this->propertyImage()->first('images');
            $decode_images = json_decode($img_data['images']);
            $images = [];
            foreach ($decode_images as $key => $image) {
                $images[] = asset(config('const.p_img_path')) . '/' . $image;
            }
            $data['images'] = $images;
        }

        /* Supplyment */
        $data['note'] = $this->suppliment ? $this->suppliment->note : null;

        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id', Auth::guard('api')->user()->id)->where('property_id', $this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = (string)$favorite->id;
            } else {
                $data['favorite_status'] = '0';
            }
        }
        /* User */
        $data['view_count'] = $this->view_count ? $this->view_count : null;
        $data['status'] = $this->status;
        $data['expired_at'] = Carbon::parse($this->created_at)->addYear()->format('Y-m-d H:m:s');
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        $data['user'] = [
            'id' => (string)$this->user->id ?? null,
            'name' => $this->user->name ?? null,
            'phone' => $this->user->phone ?? null,
            'company_name' => $this->user->company_name ?? null,
            'user_type' => (string)$this->user->user_type ?? null,
            'post_count' => $this->user->properties ? (string)$this->user->properties->count() : '0',
            'profile_photo' => $this->user->profile_photo ?? null,
            'cover_photo' => $this->user->cover_photo ?? null,
        ];
        return $data;
    }
}
