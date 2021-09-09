@extends('backend.layouts.app')
@section('title', 'Create Admin User')
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
                <div>Create Admin User
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                        components.
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                @include('backend.layouts.flash')
                <form action="{{ route('admin.admin-user.store')}}" method="POST" id="create">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Role Level</label>
                        <select name="role_id" class="form-control">
                            @foreach (config('const.role_level') as $key => $role)
                                <option value="{{$key}}">{{$role}}</option>    
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
{!! JsValidator::formRequest('App\Http\Requests\CreateAdminUserRequest','#create') !!}
    <script>
        $(document).ready(function() {
           
        });
    </script>

@endsection
