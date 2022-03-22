<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class StagingController extends Controller
{
    public function test_route()
    {
        $ids = Property::get('id');
        // dd($ids->pluck('id'));
        $ids= $ids->pluck('id'); //sent from the front-end

        foreach ($ids as $key => $id) {
            Property::where('id', $id)->update(['title'=>'lorun ipsum lorun log lorun ipsum lorun log ']);
        }
        return 'done';
    }
}
