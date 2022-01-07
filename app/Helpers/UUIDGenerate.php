<?php 

namespace App\Helpers;
use App\Property;
use App\User;

class UUIDGenerate{
    public static function pCodeGenerator()
    {
        
        $number = mt_rand(10000000,999999999);
        if(Property::where('p_code',$number)->exists()){
            self::pCodeGenerator();
        }
        return $number;
        
    }
    public static function vCodeGenerator()
    {
        
        $number = mt_rand(100000,999999);
        if(User::where('verify_code',$number)->exists()){
            self::vCodeGenerator();
        }
        return $number;
        
    }
}

?>