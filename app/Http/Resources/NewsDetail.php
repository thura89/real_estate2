<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsDetail extends JsonResource
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
            "post_title" => $this->post_title,
            "author" => [
                'name' => $this->user ? $this->user->name : null,
                'role' => $this->user ? config('const.role_level')[$this->user->user_type] : null,
                'profile_photo' => $this->user ? $this->user->profile_photo : null,
            ],
            "view_count" => $this->view_count,
            "category" => config('const.news_category')[$this->category],
            "images" => $this->images,
            "post_letter" => $this->post_letter,
            "created_at" => Carbon::parse($this->created_at)->format('Y-m-d H:m:s'),
        ];
    }
}
