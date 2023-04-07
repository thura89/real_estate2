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
        return [
            'id' => (string)$this->id ?? null,
            'title' => $this->title ?? null,
            'phone' => $this->phone_no ?? null,
            'budget_from' => (string)$this->budget_from ?? null,
            'budget_to' => (string)$this->budget_to ?? null,
            'currency_code' => $this->currency_code ?? null,
            'area_unit' => (string)$this->area_unit ?? null,
            'area_width' => (string)$this->area_width ?? null,
            'area_length' => (string)$this->area_length ?? null,
            'floor_level' => (string)$this->floor_level ?? null,
            'completion' => (string)$this->completion ?? null,
            'furnished_status' => (string)$this->furnished_status,
            'co_broke' => (string)$this->co_broke ?? null,
            'region' => [
                'id' => (string)$region->id ?? null,
                'name' => (string)$region->name ?? null,
            ],
            'township' => [
                'id' => (string)$township->id ?? null,
                'name' => (string)$township->name ?? null,
            ],
            'properties_type' => (string)$this->properties_type ?? null,
            'properties_category' => (string)$this->properties_category ?? null,
            'descriptions' => $this->descriptions ?? null,
            'terms_condition' => (string)$this->terms_condition ?? null,
            'status' => (string)$this->status ?? null,
            'post_by' => $this->user->name ?? null,
            'view_count' =>  (string)$this->view_count ?? null,
            'user' => [
                'id' => (string)$this->user->id ?? null,
                'name' => $this->user->name ?? null,
                'phone' => $this->user->phone ?? null,
                'company_name' => $this->user->company_name ?? null,
                'user_type' => (string)$this->user->user_type ?? null,
                'profile_photo' => $this->user->profile_photo ?? null,
                'cover_photo' => $this->user->cover_photo ?? null,
            ],
            'expired_at' => Carbon::parse($this->created_at)->addYear()->format('d-m-y H:m:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s') ?? null,
        ];
    }
}