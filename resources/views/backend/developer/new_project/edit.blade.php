@extends('backend.developer.layouts.app')
@section('title', 'Edit new_project Management')
@section('new_project-active', 'mm-active')
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
                    <div>Update New Project
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary back-btn"><i class="fas fa-chevron-circle-left"></i> Back</button>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    @include('backend.developer.layouts.flash')
                    <form action="{{ route('developer.new_project.update', $data->id) }}" id="update" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        {{-- address --}}
                        <div class="form-group">
                            <h5>Title</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="title">Title</label>
                                    <input value="{{ $data->title }}" name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <h5>Address</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="region">Region</label>
                                    @php
                                        $region = $data->region()->first('name');
                                    @endphp
                                    <span class="region_old badge badge-secondary">{{ $region['name'] }}</span>
                                    <select name="region" class="region form-control">
                                        <option value="">Select Region</option>
                                        @foreach ($regions as $key => $region)
                                            <option value="{{ $region->id }}"
                                                @if (old('region') == $region->id) selected="selected" @endif>
                                                {{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="township">Township</label>
                                    @php
                                        $township = $data->township()->first('name');
                                    @endphp
                                    <span class="township_old badge badge-secondary">{{ $township['name'] }}</span>
                                    <select name="township" class="township form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Detail --}}
                        <div class="form-group">
                            <h5>About Project Description</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="about_project" class="form-control">{{ $data->about_project }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- Image --}}
                        <div class="form-group">
                            <h5>Images</h5>
                            <hr>
                            <div class="input-field">
                                <label class="active">Photos</label>
                                <div class="input-images-2" style="padding-top: .5rem;"></div>
                            </div>
                        </div>
                        {{-- Submit Button --}}
                        <div class="row">
                            <div class="col form-group">
                                <button class="btn btn-secondary back-btn">Back</button>
                                <button type="submit" class="btn btn-primary" id="">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateNewProjectRequest', '#update') !!}
    @include('backend.property.rent_script')
    <script>
        $(document).ready(function() {
            $('.region').on('change', function() {
                $('.region_old').hide();
                $('.township_old').hide();
                var region_id = this.value;
                if (region_id == '') {
                    $('.region_old').show();
                    $('.township_old').show();
                }
                $(".township").html('');
                $.ajax({
                    url: "{{ url('/developer/township') }}",
                    type: "POST",
                    data: {
                        region_id: region_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('.township').html('<option value="">Select State</option>');
                        $.each(result.township, function(key, value) {
                            $(".township").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });

                    }
                });
            });
        });
    </script>

@endsection
