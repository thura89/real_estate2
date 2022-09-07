<?php

namespace App\Http\Controllers\Backend\Agent;

use App\User;
use App\Property;
use Carbon\Carbon;
use App\WantToBuyRent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::findOrFail(Auth()->user()->id);
        $WantToBuyRents = WantToBuyRent::query()->where('user_id',Auth::user()->id)->get();
        $properties = Property::query()->whereDate('created_at', '>=', Carbon::today()->subMonths(12))->where('user_id',Auth::user()->id)->get();
        
        return view('backend.agent.index',compact('users','WantToBuyRents','properties'));
    }
}
