<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [];
    public function address()
    {
        return $this->belongsTo(Address::class, 'id', 'region');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
