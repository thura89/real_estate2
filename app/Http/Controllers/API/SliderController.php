<?php

namespace App\Http\Controllers\API;

use App\Slider;
use App\Helpers\ResponseHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Slider as APISlider;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $data = Slider::where('status',1)->get();
        if (!$data) {
            return ResponseHelper::fail('Fail', 'Something Wrong');
        }
        return ResponseHelper::success('Success', APISlider::collection($data));

    }
    
}
