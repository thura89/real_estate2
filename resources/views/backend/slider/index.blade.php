@extends('backend.layouts.app')
@section('title', 'Slider Management')
@section('slider-active', 'mm-active')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>App Slider Management
                    </div>
                </div>
            </div>

        </div>
        <div class="mb-3 d-flex align-items-end flex-column">
            <div class="d-inline-block dropdown">
                <a href="{{ route('admin.slider.create') }}"
                    class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Create
                    Slider
                </a>
            </div>
        </div>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderd DataTables">
                        <thead>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
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
    <br>
    
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $('.DataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/slider/datatables/ssd",
                columns: [
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'images',
                        name: 'images',
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
                        name: 'created_at',
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        sortable: false,
                    },

                ],
                columnDefs: [{
                    target: 'no-sort',
                    sortable: false,
                }],
            });
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Do you want to delete it?',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/slider/' + id,
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

@endsection