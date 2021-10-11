<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function property()
    {
        return $this->belongsTo(Property::class,'id','properties_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class,'region','id');
    }
    public function township()
    {
        return $this->belongsTo(Township::class,'township','id');
    }
}
