<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class Want2BuyRentListsResource extends JsonResource
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
            'region' => $this->region()->first(['id', 'name']),
            'township' => $this->township()->first(['id', 'name']),
            'properties_type' => $this->properties_type,
            'properties_category' => $this->properties_category,
            'descriptions' => Str::limit($this->descriptions, 50, '...'),
            'status' => (string)$this->status, //
            'expired_at' => Carbon::parse($this->created_at)->addYear()->format('Y-m-d H:m:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}