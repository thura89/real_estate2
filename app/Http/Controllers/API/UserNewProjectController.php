<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\NewProject;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NewProjectList;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\UserNewProjectResource;

class UserNewProjectController extends Controller
{
    public function index(Request $request)
    {
        $data = NewProject::query()->with([
            'region',
            'township',
        ])->where('user_id', auth()->user()->id);

        $data = $data->orderBy('created_at', 'ASC')->paginate(10);

        if ($data) {
            return NewProjectList::collection($data)->additional(['result' => true, 'message' => 'Success']);
        } else {
            return ResponseHelper::fail('fail', null);
        }
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            /** Title */
            'title' => 'required',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* Description */
            'about_project' => 'required',

            /* Description */
            'images' => 'required',

        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }

        $data = new NewProject();
        $data->user_id = Auth()->user()->id;

        /* Address */
        $data->title = $request->title;
        $data->region = $request->region;
        $data->township = $request->township;


        /* Description */
        $data->about_project = $request->about_project;

        /* Property Image */
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/new_project/' . $file_name, file_get_contents($image));
                $data_img[] = $file_name;
            }
        }
        $data->images = json_encode($data_img);
        $data->status = config('const.publish');
        $data->save();

        return ResponseHelper::success('Successfully Created', Null);
    }
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            /** Title */
            'title' => 'required',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* Description */
            'about_project' => 'required',

        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }

        $data = NewProject::where('user_id', Auth::user()->id)->findOrFail($id);

        $data->title = $request->title ?? $data->title;
        /* Address */
        $data->region = $request->region ?? $data->region;
        $data->township = $request->township ?? $data->township;


        /* Description */
        $data->about_project = $request->about_project ?? $data->about_project;

        /* Property Image */
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/new_project/' . $file_name, file_get_contents($image));
                $data_images[] = $file_name;
            }
            $decode_images = json_decode($data->images);
            $result = array_merge($decode_images, $data_images);
            $data->images = $result;
        }

        $data->update();

        return ResponseHelper::success('Successfully Updated', Null);
    }
    public function DeleteNewProjectImage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'images' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request', $validate->errors());
        }

        $data = NewProject::where('user_id', auth()->user()->id)
            ->where('id', $request->id)
            ->first();
        if (!$data) {
            return ResponseHelper::fail('Fail Request', 'Data not found');
        }
        $data_images = json_decode($data->images);
        $images = explode(',', $request->images);
        if ($data) {
            foreach ($images as $key => $del) {
                Storage::disk('public')->delete('/new_project/' . $del);
                $rev = array_search($del, $data_images);
                unset($data_images[$rev]);
            }
            $data->images = array_values($data_images);
            $data->push();
        }
    }
    public function show(Request $request, $id)
    {
        $data = NewProject::query()->with([
            'region',
            'township',
            'user'
        ])->where('user_id', Auth::user()->id)->findOrFail($id);
        if ($data) {
            $data = new UserNewProjectResource($data);
            return ResponseHelper::success('Success', $data);
        } else {
            return ResponseHelper::fail('fail', null);
        }
    }
    public function destroy(Request $request, $id)
    {
        $data = NewProject::where('user_id', Auth::user()->id)->findOrFail($id);
        $data_images = json_decode($data->images);
        if ($data) {
            foreach ($data_images as $key => $del) {
                Storage::disk('public')->delete('/new_project/' . $del);
            }
        }
        $data->delete();
        return ResponseHelper::success('Successfully Delete', Null);
    }
    public function renew($id)
    {
        $data = NewProject::where('user_id', Auth::user()->id)->findOrFail($id);
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->status = config('const.publish'); //Renew status == 1
        $data->update();
        return ResponseHelper::success('Success', 'Successfully Extended');
    }
}
