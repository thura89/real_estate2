<?php

namespace App\Http\Resources\API;

use App\Http\Resources\PropertyList;
use App\Http\Resources\API\PropertyRecommend;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyCombine extends JsonResource
{

    public function __construct($data,$recommend)
    {
        $this->data = $data;
        $this->recommend = $recommend;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => PropertyList::collection($this->data),
            'recommend' => PropertyRecommend::collection($this->recommend),
        ];
    }
}
