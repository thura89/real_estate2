<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /* User */
    public function user()
    {
        return $this->belongsTo(User::class, 'post_by', 'id');
    }
    // public function getImagesAttribute($value)
    // {
    //     if ($value) {
    //         return asset('storage/news/' . $value);
    //     } else {
    //         return asset('images/profile/no-image.png');
    //     }
    // }
    // public function setImagesAttribute($value)
    // {
    //     $this->attributes['images'] = $value;
    // }
}
