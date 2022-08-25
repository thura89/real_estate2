<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNewProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $region = $this->region ?? null;
        $township = $this->township ?? null;
        /* Get Image */
        $decode_images = json_decode($this->images);
        $images = [];
        foreach ($decode_images as $key => $image) {
            $images[] = asset(config('const.new_project_img_path')) . '/' . $image;
        }
        $images = $images ?? null; 
        return [
            
            'region' => $region ?? null,
            'township' => $township ?? null,
            'min_price' => number_format($this->min_price) ?? null,
            'max_price' => number_format($this->max_price) ?? null,
            'currency_code' => $this->currency_code ?? null,
            'project_start_at' => Carbon::parse($this->project_start_at)->format('Y') ?? null,
            'project_end_at' => Carbon::parse($this->project_end_at)->format('Y') ?? null,
            'townsandvillages' => $this->townsandvillages ?? null,
            'wards' => $this->wards ?? null,
            'street_name' => $this->street_name ?? null,
            'type_of_street' => $this->type_of_street ?? null,
            'area_unit' => $this->area_unit ?? null,
            'purchase_type' => $this->purchase_type ?? null,
            'installment' => $this->installment ?? null,
            'new_project_sale_type' => $this->new_project_sale_type ?? null,
            'preparation' => $this->preparation ?? null,
            'about_project' => $this->about_project ?? null,
            'elevator' => $this->elevator ?? null,
            'garage' => $this->garage ?? null,
            'fitness_center' => $this->fitness_center ?? null,
            'security' => $this->security ?? null,
            'swimming_pool' => $this->swimming_pool ?? null,
            'spa_hot_tub' => $this->spa_hot_tub ?? null,
            'playground' => $this->playground ?? null,
            'garden' => $this->garden ?? null,
            'own_transformer' => $this->own_transformer ?? null,
            'disposal' => $this->disposal ?? null,
            'images' => $images ?? null,
            'user' => [
                'name' => $this->user ? $this->user->name : null,
                'profile_photo' => $this->user ? $this->user->profile_photo : null,
            ],
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-y H:m:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}   
