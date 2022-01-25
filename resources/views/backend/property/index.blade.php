@extends('backend.layouts.app')
@section('title', 'Property Management')
@section('property-active', 'mm-active')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Property Management
                    </div>
                </div>
            </div>

        </div>
        <div class="mb-3 d-flex align-items-end flex-column">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow dropdown-toggle btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Create
                    Property
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right"
                    x-placement="bottom-end"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(112px, 33px, 0px);">
                    <ul class="nav flex-column">
                        @foreach (config('const.property_category') as $key => $item)
                            <li class="nav-item">
                                <a href="{{ route('admin.property.create') }}?property_category={{ $key }}"
                                    class="dropdown-item">
                                    {{ $item }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class=" row">
                    <div class="col">
                        <select id='type' class="form-control">
                            <option value="">Type</option>
                            @foreach (config('const.property_type') as $key => $type)
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select id='category' class="form-control">
                            <option value="">Category</option>
                            @foreach (config('const.property_category') as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select id='region' class="form-control">
                            <option value="">Region</option>
                            @foreach ($regions as $key => $reg)
                                <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select id='township' class="form-control">
                        </select>
                    </div>
                    <div class="col">
                        <select id='status' class="form-control">
                            <option value="">Feature</option>
                            @foreach (config('const.publish_status') as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="text" id="btnFiterSubmitSearch" class="mt-2 btn btn-primary"><i
                                class="pe-7s-filter"></i> Advance Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderd DataTables">
                    <thead>
                        <th class="no-sort">Img</th>
                        <th class="no-sort">P-Code</th>
                        <th>Region</th>
                        <th>Township</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th class="no-sort">Recommended</th>
                        <th>Created At</th>
                        <th class="no-sort">Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $('.DataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/property/datatables/ssd",
                    type: 'GET',
                    data: function(d) {
                        d.status = $('#status').val();
                        d.type = $('#type').val();
                        d.region = $('#region').val();
                        d.township = $('#township').val();
                        d.category = $('#category').val();
                    }
                },
                columns: [{
                        data: 'images',
                        name: 'images',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'p_code',
                        name: 'p_code',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'region',
                        name: 'region',
                        sortable: false,

                    },
                    {
                        data: 'township',
                        name: 'township',
                        sortable: false,
                    },
                    {
                        data: 'price',
                        name: 'price',
                        sortable: false,
                    },
                    {
                        data: 'properties_type',
                        name: 'properties_type',
                        sortable: false,
                        searchable: false,

                    },
                    {
                        data: 'category',
                        name: 'category',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'status',
                        name: 'status',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        sortable: false,
                        searchable: false,
                    },
                    
                ],
                columnDefs: [{
                        orderable: false,
                        targets: 0,
                        // visible:false

                    }]
            });
            $('#btnFiterSubmitSearch').click(function() {
                $('.DataTables').DataTable().draw(true);
            });
            // Delete Button
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/property/' + id,
                            type: 'DELETE',
                            data: {
                                '_token': "{{ csrf_token() }}",
                            },
                            success: function() {
                                table.ajax.reload();
                            }
                        });
                    }
                })
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#township').html('<option value="">Choose First Region</option>');
            $('#region').on('change', function() {
                var region_id = this.value;
                $("#township").html('');
                $.ajax({
                    url: "{{ url('/admin/township') }}",
                    type: "POST",
                    data: {
                        region_id: region_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#township').html('<option value="">Select Township</option>');
                        $.each(result.township, function(key, value) {
                            $("#township").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });

                    }
                });
            });
        });
    </script>

@endsection
