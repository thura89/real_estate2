<?php

namespace App\Http\Controllers\Backend;

use App\News;
use App\User;
use App\Slider;
use App\Property;
use Carbon\Carbon;
use App\NewProject;
use App\WantToBuyRent;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        $newprojects = NewProject::query()->get();
        $WantToBuyRents = WantToBuyRent::query()->get();
        $properties = Property::query()->whereDate('created_at', '>=', Carbon::today()->subMonths(12))->get();
        $news = News::query()->with(['user'])->orderBy('updated_at','DESC')->get();
        $sliders = Slider::query()->orderBy('updated_at','DESC')->get();
        
        return view('backend.index',compact('users','newprojects','WantToBuyRents','properties','news','sliders'));
    }
}
