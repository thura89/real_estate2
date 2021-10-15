<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewProject extends Model
{
    
    public function region()
    {
        return $this->belongsTo(Region::class,'region','id');
    }
    public function township()
    {
        return $this->belongsTo(Township::class,'township','id');
    }
}
