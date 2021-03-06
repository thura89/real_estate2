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
            
            'region' => $region->name ?? null,
            'township' => $township->name ?? null,
            'price' => number_format($this->min_price) .' to '. number_format($this->max_price) .' '. config('const.currency_code')[$this->currency_code] ?? null,
            'project_start_at' => Carbon::parse($this->project_start_at)->format('Y') ?? '-',
            'project_end_at' => Carbon::parse($this->project_end_at)->format('Y') ?? '-',
            'townsandvillages' => $this->townsandvillages,
            'wards' => $this->wards,
            'street_name' => $this->street_name,
            'type_of_street' => $this->type_of_street,
            'currency_code' => $this->currency_code,
            'area_unit' => $this->area_unit,
            'purchase_type' => $this->purchase_type,
            'installment' => $this->installment,
            'new_project_sale_type' => $this->new_project_sale_type,
            'preparation' => $this->preparation,
            'about_project' => $this->about_project,
            'elevator' => $this->elevator,
            'garage' => $this->garage,
            'fitness_center' => $this->fitness_center,
            'security' => $this->security,
            'swimming_pool' => $this->swimming_pool,
            'spa_hot_tub' => $this->spa_hot_tub,
            'playground' => $this->playground,
            'garden' => $this->garden,
            'own_transformer' => $this->own_transformer,
            'disposal' => $this->disposal,
            'images' => $images,
            'user' => [
                'name' => $this->user ? $this->user->name : null,
                'profile_photo' => $this->user ? $this->user->profile_photo : null,
            ],
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-y H:m:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}   
