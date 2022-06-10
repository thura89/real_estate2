<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Region;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateDeveloperUserRequest;
use App\Http\Requests\UpdateDeveloperUserRequest;

class DeveloperUserController extends Controller
{
    public function index()
    {
        $regions = Region::get(['name', 'id']);
        return view('backend.developer-user.index',compact('regions'));
    }
    public function ssd(Request $request)
    {
        $data = User::query()->where('user_type',5)
                             ->orderBy('updated_at','desc')
                             ->with([
                                 'region',
                                 'township'
                                 ]);// 5 = Developer User  
        if ($request->get('keywords')) {
        $keywords = $request->get('keywords');
        $data->where(function($query) use ($keywords){
            $query->orWhere('company_name', 'LIKE' , '%'.$keywords.'%')
                    ->orWhere('name', 'LIKE' , '%'.$keywords.'%')
                    ->orWhere('email', 'LIKE' , '%'.$keywords.'%')
                    ->orWhere('phone', 'LIKE' , '%'.$keywords.'%');
        });
        }
        if ($request->get('region')) {
            $data->where('region', $request->get('region'));
        }
        if ($request->get('township')) {
            $data->where('township', $request->get('township'));
        }  
        return Datatables::of($data)
        ->editColumn('profile_photo',function($each){
            return "<img src='$each->profile_photo' class='rounded-circle' width='50'>" ?? '-';
        })
        ->editColumn('region', function ($each) {
            $region = $each->region()->first('name');
            return $region->name ?? '-';
        })
        ->editColumn('user_agent' ,function($each){
            if ($each->user_agent){
                $agent = new Agent();
                $agent->setUserAgent($each->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();

                return '<span class="badge badge-primary">'.$device.'</span></br>'.
                       '<span class="badge badge-success">'.$platform.'</span></br>'.
                       '<span class="badge badge-info">'.$browser.'</span>'.
                       '<span class="badge badge-primary">'.$each->ip.'</span>';
            }
            return '-';
        })
        ->editColumn('login_at',function($each){
            return Carbon::parse($each->login_at)->diffForHumans();
        })
        ->editColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('d-m-y H:i:s');
        })
        ->addColumn('action',function($each){
            $edit_icon = '<a href="'.route('admin.developer-user.edit',$each->id).'" class="text-warning"><i class="fas fa-edit"></i></a>';
            $delete_icon = '<a href="" class="text-danger delete" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">' .$edit_icon.$delete_icon .'</div>';
        })
        ->rawColumns(['profile_photo','user_agent','action'])
        ->make(true);
        
    }
    public function create(){
        $regions = Region::get(['name', 'id']);
        return view('backend.developer-user.create',compact('regions'));
    }
    public function store(CreateDeveloperUserRequest $request){
        $developerUser = new User();
        if ($request->hasFile('profile_photo')) {
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
        }
        if ($request->hasFile('cover_photo')) {
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
        }
        /* Company Image */
        $company_images = [];
        if ($request->hasfile('images')) {
            $company_images = [];
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                $company_images[] = $file_name;
            }
        }

        $developerUser->user_type = config('const.Developer');
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->other_phone = $request->other_phone ?? null;
        $developerUser->region = $request->region;
        $developerUser->township = $request->township;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->profile_photo = $profile_img_name;
        $developerUser->cover_photo = $cover_img_name;
        $developerUser->company_images = $company_images;
        $developerUser->password = Hash::make($request->password);
        $developerUser->save();
        return redirect()->route('admin.developer-user.index')->with('create', 'Successfully Created');
    }
    public function edit($id){
        $regions = Region::get(['name', 'id']);
        $developerUser = User::findOrFail($id);
        $images_data = $developerUser['company_images'];
        
        if (!$images_data) {
            $images = [];
            $img_func_data = 1;
        }else{
            $images = [];
            foreach ($images_data as $key => $image) {
                $images[] = [
                    'id' => $image,
                    'src' => asset(config('const.company_images')) . '/' . $image
                ];
            }
            $images = json_encode($images);
            $img_func_data = 2;
        }
        return view('backend.developer-user.edit',compact('developerUser','regions','images','img_func_data'));
    }
    public function update($id, UpdateDeveloperUserRequest $request){
        $developerUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$developerUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $developerUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$developerUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $developerUser->cover_photo = $cover_img_name;
        }
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->other_phone = $request->other_phone ?? null;
        $developerUser->region = $request->region;
        $developerUser->township = $request->township;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->password = $request->password ? Hash::make($request->password) : $developerUser->password;

        /* Property Image */
        $company_images = [];
        if ($request->hasfile('images')) {
            $company_images = [];
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                $company_images[] = $file_name;
            }
        }

        // Splice if not img 
        if ($request->old || $request->photos) {
            $old_data = $request->old ?? [];
            $count = count($request->file('photos') ?? []);
            $data = array_reverse($old_data);
            $splice_data = array_splice($data, $count);

            // Fetch Old Image
            // $store_data = json_decode($developerUser['company_images']);

            // Diff image
            $collection = collect($developerUser['company_images']);
            $diff_image = $collection->diff($splice_data);

            // Delete image
            if (!$diff_image->all() == []) {
                foreach ($diff_image as $key => $diff) {
                    Storage::disk('public')->delete('/company_images/' . $diff);
                }
            }

            // Get Remain Data from coming form
            foreach ($splice_data as $image) {
                $data[] = $image;
            }

            // Upload New image
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            // Splice No Need Data
            $company_images = array_splice($data, $count);
        }
        $developerUser->company_images = $company_images;
        $developerUser->update();
        return redirect()->route('admin.developer-user.index')->with('update', 'Successfully Updated');
    }
    public function destroy($id){
        $developerUser = User::findOrFail($id);
        $developerUser->delete();
        return 'success';
    }
}
