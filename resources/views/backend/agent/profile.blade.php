@extends('backend.agent.layouts.app')
@section('title', 'Edit Profile')
@section('profile-active', 'mm-active')
@section('extra-css')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{ asset('/backend/css/image-uploader.css') }}">
@endsection
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Profile
                    </div>
                </div>
            </div>

        </div>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    @include('backend.agent.layouts.flash')
                    <form action="{{ route('agent.profile.update', $agentUser->id) }}" method="POST" id="update"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ $agentUser->company_name }}">
                            </div>
                            <div class="col-md-6 col form-group">
                                <label for="name">Name</label>
                                <input type="name" name="name" class="form-control" value="{{ $agentUser->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $agentUser->email }}">
                            </div>
                            <div class="col-md-4 col form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" value="{{ $agentUser->phone }}">
                            </div>
                            <div class="col-md-4 col form-group">
                                <label for="agent_type">Agent Type</label>
                                <select name="agent_type" class="form-control">
                                    <option value="">Select</option>
                                    @foreach (config('const.agent_type') as $key => $agent)
                                        <option value="{{ $key }}" @if ($agentUser->agent_type == $key) selected @endif>{{ $agent }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="10">{{ $agentUser->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $agentUser->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="profile_photo">
                                <label for="profile_photo">Profile Photo</label>
                                <input type="file" name="profile_photo" id="profile_photo" class="form-control"/>
                            </div>
                            <div class="preview_profile_photo mt-2">
                                @if ($agentUser->profile_photo)
                                        <img src="{{ $agentUser->profile_photo}}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="cover_photo">
                                <label for="cover_photo">Cover Photo</label>
                                <input type="file" name="cover_photo" id="cover_photo" class="form-control"/>
                            </div>
                            <div class="preview_cover_photo mt-2">
                                @if ($agentUser->cover_photo)
                                        <img src="{{ $agentUser->cover_photo}}" alt="">
                                @endif
                            </div>
                        </div>
                         {{-- Image --}}
                         <div class="form-group">
                            <div class="input-field">
                                <label class="active">Company Photos</label>
                                <div class="input-images-2" style="padding-top: .5rem;"></div>
                            </div>
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
    {!! JsValidator::formRequest('App\Http\Requests\AgentProfileUpdateRequest', '#update') !!}
    @include('backend.property.rent_script')
    <script>
        $(document).ready(function() {
            $('#cover_photo').on('change', function() {
                $('.preview_cover_photo').html('');
                var f_length = document.getElementById('cover_photo').files.length;
    
                for (let index = 0; index < f_length; index++) {
                    $('.preview_cover_photo').append(
                        `<img src="${URL.createObjectURL(event.target.files[index])}">`);
                }
            });
            $('#profile_photo').on('change', function() {
                $('.preview_profile_photo').html('');
                var f_length = document.getElementById('profile_photo').files.length;
    
                for (let index = 0; index < f_length; index++) {
                    $('.preview_profile_photo').append(
                        `<img src="${URL.createObjectURL(event.target.files[index])}">`);
                }
            });
        });
    </script>
@endsection
