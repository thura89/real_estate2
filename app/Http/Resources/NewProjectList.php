<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Str;
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
        // Properties
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');

        // User
        $userRegion = $this->user->region()->first('name');
        $userTownship = $this->user->township()->first('name');

        $image = json_decode($this->images);
        $image = asset(config('const.new_project_img_path')) . '/' . $image[0];
        return [
            'id' => $this->id,
            'about_project' => Str::limit($this->about_project, 60, '...'),
            'sale_type' => config('const.developer_sale_type')[$this->new_project_sale_type],
            'region' => $region->name ?? '-',
            'township' => $township->name ?? '-',
            'min_price' => number_format($this->min_price) ?? null,
            'max_price' => number_format($this->max_price) ?? null,
            'currency_code' => config('const.currency_code')[$this->currency_code] ?? null,
            'start_at' => Carbon::parse($this->project_start_at)->format('Y') ?? '-',
            'end_at' => Carbon::parse($this->project_end_at)->format('Y') ?? '-',
            'images' => $image ?? '/backend/images/no-image.jpeg',
            'user' => [
                'company_name' => $this->user->company_name,
                'name' => $this->user->name ?? null,
                'email' => $this->user->email,
                'phone' => $this->user->phone ?? null,
                'region' => $userRegion['name'] ?? null,
                'township' => $userTownship['name'] ?? null,
                'address' => $this->user->address ?? null,
                'profile_photo' => $this->user->profile_photo,
            ],
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}