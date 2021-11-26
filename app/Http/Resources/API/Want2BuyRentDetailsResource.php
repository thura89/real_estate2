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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'phone' => $this->phone_no,
            'budget_from' => $this->budget_from,
            'budget_to' => $this->budget_to,
            'currency_code' => $this->currency_code,
            'area_unit' => $this->area_unit,
            'area_width' => $this->area_width,
            'area_length' => $this->area_length,
            'floor_level' => $this->floor_level ?? null,
            'completion' => $this->completion,
            'furnished_status' => $this->furnished_status,
            'co_broke' => $this->co_broke,
            'region' => $this->region()->first(['id','name']),
            'township' => $this->township()->first(['id','name']),
            'properties_type' => $this->properties_type,
            'properties_category' => $this->properties_category,
            'descriptions' => $this->descriptions,
            'terms_condition' => $this->terms_condition,
            'status' => $this->status,
            'post_by' => $this->user->name,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}
