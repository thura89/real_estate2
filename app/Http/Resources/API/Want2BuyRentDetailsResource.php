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

        $data['id'] = (string)$this->id ?? null;
        $data['title'] = $this->title ?? null;
        $data['phone'] = $this->phone_no ?? null;
        $data['properties_type'] = (string)$this->properties_type ?? null;
        $data['properties_category'] = (string)$this->properties_category ?? null;
        $data['budget_from'] = (string)$this->budget_from ?? null;
        $data['budget_to'] = (string)$this->budget_to ?? null;
        $data['currency_code'] = $this->currency_code ?? null;
        $data['area_option'] = (string)$this->area_option ?? null;
        if ($this->area_option == 1) { #width length == 1
            $data['area_width'] = (string)$this->area_width ?? null;
            $data['area_length'] = (string)$this->area_length ?? null;
        } else {
            $data['area_size'] = (string)$this->area_size ?? null;
            $data['area_unit'] = (string)$this->area_unit ?? null;
        }

        if ($this->properties_category == 3 || $this->properties_category == 4 || $this->properties_category == 6 || $this->properties_category == 8) {
            $data['floor_level'] = (string)$this->floor_level ?? null;
        }

        $data['repairing'] = (string)$this->furnished_status;
        $data['situations'] = (string)$this->situations;

        $data['region'] = [
            'id' => (string)$region->id ?? null,
            'name' => (string)$region->name ?? null,
        ];
        $data['township'] = [
            'id' => (string)$township->id ?? null,
            'name' => (string)$township->name ?? null,
        ];

        $data['bed_room'] = (string)$this->bed_room;
        $data['bath_room'] = (string)$this->bath_room;

        $data['descriptions'] = $this->descriptions ?? null;
        $data['view_count'] =  (string)$this->view_count ?? null;
        $data['user'] = [
            'id' => (string)$this->user->id ?? null,
            'name' => $this->user->name ?? null,
            'phone' => $this->user->phone ?? null,
            'company_name' => $this->user->company_name ?? null,
            'user_type' => (string)$this->user->user_type ?? null,
            'profile_photo' => $this->user->profile_photo ?? null,
            'cover_photo' => $this->user->cover_photo ?? null,
        ];
        if ($this->status == null || $this->status == 0) {
            $status = 0;
        } else {
            $status = 1;
        }
        $data['status'] = $status ?? 0;
        $data['expired_at'] = Carbon::parse($this->created_at)->addYear()->format('d-m-y H:m:s');
        $data['created_at'] = Carbon::parse($this->created_at)->format('d-m-y H:m:s') ?? null;
        return $data;
    }
}
