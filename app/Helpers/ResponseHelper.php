<?php 
 namespace App\Helpers;

 class ResponseHelper{

    public static function success($message , $data)
    {
        return response()->json([
            'result' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function fail($message , $data)
    {
        return response()->json([
            'result' => false,
            'message' => $message,
            'data' => $data
        ]);
    }
 }

