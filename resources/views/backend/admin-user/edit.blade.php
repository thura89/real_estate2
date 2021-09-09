@extends('backend.layouts.app')
@section('title', 'Edit Admin User')
@section('admin-user-active', 'mm-active')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Admin User
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{ route('admin.admin-user.update' ,$adminUser->id)}}" method="POST" id="update">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $adminUser->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $adminUser->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{ $adminUser->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Role Level</label>
                        <select name="role_id" class="form-control">
                            @foreach (config('const.role_level') as $key => $role)
                                <option value="{{$key}}" @if($adminUser->role_id == $key) selected @endif>{{$role}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary back-btn">Back</button>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUserRequest','#update') !!}
    <script>
        $(document).ready(function() {
           
        });
    </script>

@endsection
