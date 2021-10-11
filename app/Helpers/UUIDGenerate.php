<?php 

namespace App\Helpers;
use App\Property;

class UUIDGenerate{
    public static function pCodeGenerator()
    {
        
        $number = mt_rand(10000000,999999999);
        if(Property::where('p_code',$number)->exists()){
            self::pCodeGenerator();
        }
        return $number;
        
    }
}

?>