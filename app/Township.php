<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $guarded = [];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id', 'township');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
