@extends('backend.agent.layouts.app')
@section('title', 'Property Management')
@section('property-active', 'mm-active')
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
                    <div>Property Create {{ config('const.property_category')[$category] }}
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
                    @include('backend.layouts.flash')
                    <form action="{{ route('agent.property.create') }}" method="POST" id="create"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="property_category" value="{{ $category }}">
                        {{-- Property Type --}}
                        <div class="form-group">
                            <h5>Property Type</h5>
                            <hr>
                            <div class="row">
                                <div class="col-6 col-md-4 form-group">
                                    <label for="price">Property Type</label>
                                    <select name="property_type" class="property_type form-control">
                                        <option value="">Select Type</option>
                                        @foreach (config('const.property_type') as $key => $area)
                                            <option value="{{ $key }}">{{ $area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="form-group">
                            <h5>Address</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="region">Region</label>
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
                                    <select name="township" class="township form-control">

                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Area Size --}}
                        <div class="form-group">
                            <h5>Area Size</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="area_option">Area Option</label>
                                        <select name="area_option" class="area_option form-control">
                                            <option value="">Select</option>
                                            @foreach (config('const.area_option') as $key => $area_opt)
                                                <option value="{{ $key }}">{{ $area_opt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 area_widthxlenght">
                                    <div class="row area_widthxlenght">
                                        <div class="col form-group">
                                            <label for="width">Width</label>
                                            <input type="number" name="width" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label for="length">Length</label>
                                            <input type="number" name="length" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 area">
                                    <div class="row area">
                                        <div class="col form-group">
                                            <label for="area_size">Area Size</label>
                                            <input type="number" name="area_size" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label for="area_unit">Area Unit</label>
                                            <select name="area_unit" class="area form-control">
                                                <option value="">Select</option>
                                                @foreach (config('const.area') as $key => $val)
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if ($category == 3 || $category == 4 || $category == 6 || $category == 8)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fence_width">Floor Level</label>
                                            <select name="floor_level" class="form-control">
                                                <option value="">Please Select</option>
                                                @foreach (config('const.floor_level') as $key => $level)
                                                    <option value="{{ $key }}">{{ $level }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Partation --}}
                        <div class="form-group">
                            <h5>Partation</h5>
                            <hr>
                            <div class="row">
                                <div class="col-6 col-md-4 form-group partation_hider_pause">
                                    <label for="level">Bed Room</label>
                                    <select name="bed_room" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.bed_room') as $room)
                                            <option value="{{ $room }}">{{ $room }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 col-md-4 form-group partation_hider_pause">
                                    <label for="bath_room">Bath Room</label>
                                    <select name="bath_room" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.bath_room') as $room)
                                            <option value="{{ $room }}">{{ $room }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        {{-- Price --}}
                        <div class="price_sale_hider_pause form-group">
                            <h5>Price</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="currency_code">Currency Code</label>
                                    <select name="currency_code" class="form-control">
                                        @foreach (config('const.currency_code') as $key => $currency)
                                            <option value="{{ $key }}">{{ $currency }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Situation --}}
                        <div class="form-group">
                            <h5>Situation</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="building_repairing">Repairing</label>
                                    <select name="building_repairing" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.building_repairing') as $key => $repair)
                                            <option value="{{ $key }}">{{ $repair }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="building_condition">Condition</label>
                                    <select name="building_condition" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.building_condition') as $key => $condition)
                                            <option value="{{ $key }}">{{ $condition }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <h5>Images</h5>
                            <hr>
                            <div class="input-field">
                                <label class="active">Photos</label>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </div>
                        {{-- Additional Note --}}
                        <div class="form-group">
                            <h5>Additional Note</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- Status --}}
                        <div class="form-group">
                            <h5>Status</h5>
                            <hr>
                            {{-- Feature --}}
                            <div class="row">
                                {{-- Recommended --}}
                                <div class="col-6 col-md-3 form-group">
                                    <input name="recommended_feature" type="checkbox" id="recommended_feature">
                                    <label for="recommended_feature">Recommended Feature</label>
                                </div>
                                {{-- Hot --}}
                                <div class="col-6 col-md-3 form-group">
                                    <input name="hot_feature" id="hot_feature" type="checkbox">
                                    <label for="hot_feature">Hot Feature</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <button class="btn btn-secondary back-btn">Back</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\PropertyCreateRequest', '#create') !!}
    @include('backend.property.script')
    <script>
        $('.area').hide();
        $('.area_widthxlenght').hide();
        $('.area_option').on('change', function() {
            $('.area').hide();
            $('.area_widthxlenght').hide();
            var type = this.value;
            if (type == 1) {
                $('.area').hide();
                $('.area_widthxlenght').show();
            }
            if (type == 2) {
                $('.area').show();
                $('.area_widthxlenght').hide();
            }
        });
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
                url: "{{ url('/agent/township') }}",
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
    </script>
@endsection
