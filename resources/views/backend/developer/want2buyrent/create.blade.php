@extends('backend.developer.layouts.app')
@section('title', 'Property Management')
@section('want2buyrent-active', 'mm-active')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Create Want2BuyRent
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
                    <form action="{{ route('developer.want2buyrent.store') }}" method="POST" id="create"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Property Type --}}
                        <div class="form-group">
                            <h5>Info</h5>
                            <hr>
                            <div class="row">
                                <div class="col-6 col-md-6 form-group">
                                    <label for="properties_type">Property Type</label>
                                    <select name="properties_type" class="property_type form-control">
                                        <option value="">Select Type</option>
                                        @foreach (config('const.property_type') as $key => $property_type)
                                            <option value="{{ $key }}">{{ $property_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-6 form-group">
                                    <label for="properties_category">Property Category</label>
                                    <select name="properties_category" class="property_category form-control">
                                        <option value="">Select Category</option>
                                        @foreach (config('const.property_category') as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="col-6 col-md-6 form-group">
                                    <label for="phone_no">Phone No</label>
                                    <input type="number" value="{{ Auth()->user()->phone }}" name="phone_no"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="form-group">
                            <h5>Address</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="region">Region</label>
                                    <select name="region" class="region form-control">
                                        <option value="">Select Region</option>
                                        @foreach ($regions as $key => $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
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
                                            <label for="area_width">Width</label>
                                            <input type="number" name="area_width" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                            <label for="area_length">Length</label>
                                            <input type="number" name="area_length" class="form-control">
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

                                <div class="col-md-4 floor_level">
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
                        {{-- Situation --}}
                        <div class="form-group">
                            <h5>Situation</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="repairing">Repairing</label>
                                    <select name="repairing" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.building_repairing') as $key => $repair)
                                            <option value="{{ $key }}">{{ $repair }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="situations">Situations</label>
                                    <select name="situations" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (config('const.building_condition') as $key => $condition)
                                            <option value="{{ $key }}">{{ $condition }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Budget Price --}}
                        <div class="form-group">
                            <h5>Budget Price</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="budget_from">Budget From</label>
                                    <input type="number" name="budget_from" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="budget_to">Budget To</label>
                                    <input type="number" name="budget_to" class="form-control">
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
                        {{-- Detail --}}
                        <div class="form-group">
                            <h5>Detail Description</h5>
                            <hr>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="descriptions" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- Terms And Condition --}}
                        <div class="form-group">
                            <h5>Terms And Condition</h5>
                            <hr>
                            {{-- Terms & Condition --}}
                            <div class="row">
                                <div class="col-6 col-md-5 form-group">
                                    <input name="terms_condition" type="checkbox" id="agreecheck">
                                    <label for="agreecheck">By posting this content, I agree to be contacted by
                                        affiliates</label>
                                </div>
                            </div>
                            {{-- Submit Button --}}
                            <div class="row">
                                <div class="col form-group">
                                    <button class="btn btn-secondary back-btn">Back</button>
                                    <button type="submit" class="btn btn-primary" id="agreebtn">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\CreateWant2BuyRentRequest', '#create') !!}
    @include('backend.developer.property.script')
    <script>
        $(document).ready(function() {
            $('.hider').hide();
            $('.property_category').on('change', function() {
                var category = this.value;

                if (category == 3) {
                    $('.hider').show();
                } else {
                    $('.hider').hide();
                }

            });
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
            $('.floor_level').hide();
            $('.property_category').on('change', function() {
                $('.floor_level').hide();
                var category = this.value;
                if (category == 3 || category == 4 || category == 6 || category == 8) {
                    $('.floor_level').show();
                } else {
                    $('.floor_level').hide();
                }

            });
        })
    </script>
@endsection
