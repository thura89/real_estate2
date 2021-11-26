<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewProjectList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');
        return [
            'id' => $this->id,
            'region' => $region->name ?? '-',
            'township' => $township->name ?? '-',
            'price' => number_format($this->min_price) .' to '. number_format($this->max_price) .' '. config('const.currency_code')[$this->currency_code] ?? '-',
            'start_at' => Carbon::parse($this->project_start_at)->format('Y') ?? '-',
            'end_at' => Carbon::parse($this->project_end_at)->format('Y') ?? '-',
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}
