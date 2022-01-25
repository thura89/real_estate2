<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Follow;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\AgentList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FollowUnfollowRequest;

class FollowController extends Controller
{
    public function follow(Request $request)
    {

        
        $validate = Validator::make($request->all(), [
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value == auth()->id()) {
                        $fail("You cannot follow yourself.");
                    }
                }
            ]
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }
        $follow_id = $request->user_id;
        $follow = Follow::where(function ($query) use ($follow_id) {
                        $query->where('following_id','=', $follow_id);
                    })->where(function ($query)  {
                        $query->where('user_id', auth()->id());
                    })->first();
        if ($follow) {
            return ResponseHelper::fail('Fail to request', 'Already followed this user');
        }
        $userToFollow = User::findOrFail(request('user_id'));
        $data = auth()->user()->follow($userToFollow);

        return ResponseHelper::success('Success', $data);
    }

    public function unfollow(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value == auth()->id()) {
                        $fail("You cannot follow yourself.");
                    }
                }
            ]
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $userToUnfollow = User::findOrFail(request('user_id'));
        $data = auth()->user()->unfollow($userToUnfollow);

        return ResponseHelper::success('Success', $data);
    }

    public function myFollowerList(Request $request)
    {
        $data = auth()->user()->following()->get();
        $data = AgentList::collection($data)->additional(['result'=>true,'message'=>'Success']);

        return $data;
        
    }
}
