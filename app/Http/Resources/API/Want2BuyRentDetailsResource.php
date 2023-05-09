<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Want2BuyRentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $region = $this->region()->first(['id', 'name']);
        $township = $this->township()->first(['id', 'name']);



        $data = [];

        $data['id'] = $this->id ? (string)$this->id : NULL;
        $data['title'] = $this->title ?? NULL;
        $data['phone'] = $this->phone_no ?? NULL;
        $data['properties_type'] = $this->properties_type ? (string)$this->properties_type : NULL;
        $data['properties_category'] = $this->properties_category ? (string)$this->properties_category : NULL;
        $data['budget_from'] = $this->budget_from ? (string)$this->budget_from : NULL;
        $data['budget_to'] = $this->budget_to ? (string)$this->budget_to : NULL;
        $data['currency_code'] = $this->currency_code ? $this->currency_code : NULL;
        $data['area_option'] = $this->area_option ? (string)$this->area_option : NULL;
        if ($this->area_option == 1) { #width length == 1
            $data['area_width'] = $this->area_width ? (string)$this->area_width : NULL;
            $data['area_length'] = $this->area_length ? (string)$this->area_length : NULL;
        } else {
            $data['area_size'] = $this->area_size ? (string)$this->area_size : NULL;
            $data['area_unit'] = $this->area_unit ? (string)$this->area_unit : NULL;
        }

        if ($this->properties_category == 3 || $this->properties_category == 4 || $this->properties_category == 6 || $this->properties_category == 8) {
            $data['floor_level'] = $this->floor_level ? (string)$this->floor_level : NULL;
        }

        $data['repairing'] = $this->furnished_status ? (string)$this->furnished_status : NULL;
        $data['situations'] = $this->situations ? (string)$this->situations : NULL;

        $data['region'] = [
            'id' => $region->id ? (string)$region->id : NULL,
            'name' => $region->name ? (string)$region->name : NULL,
        ];
        $data['township'] = [
            'id' => $township->id ? (string)$township->id : NULL,
            'name' => $township->name ? (string)$township->name : NULL,
        ];

        $data['bed_room'] = $this->bed_room ? (string)$this->bed_room : NULL;
        $data['bath_room'] = $this->bed_room ? (string)$this->bath_room : NULL;

        $data['descriptions'] = $this->descriptions ?? NULL;
        $data['view_count'] =  $this->view_count ? (string)$this->view_count : NULL;
        $data['user'] = [
            'id' => $this->user ? (string)$this->user->id : NULL,
            'name' => $this->user ? $this->user->name : NULL,
            'phone' => $this->user ? $this->user->phone : NULL,
            'company_name' => $this->user ? $this->user->company_name : NULL,
            'user_type' => $this->user ? (string)$this->user->user_type : NULL,
            'profile_photo' => $this->user ? $this->user->profile_photo : NULL,
            'cover_photo' => $this->user ? $this->user->cover_photo : NULL,
        ];
        if ($this->status == NULL || $this->status == 0) {
            $status = 0;
        } else {
            $status = 1;
        }
        $data['status'] = $status ?? 0;
        $data['expired_at'] = Carbon::parse($this->created_at)->addYear()->format('d-m-y H:m:s');
        $data['created_at'] = Carbon::parse($this->created_at)->format('d-m-y H:m:s') ?? NULL;
        return $data;
    }
}