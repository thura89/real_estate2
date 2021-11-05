@extends('backend.layouts.app')
@section('title', 'Developer User Management')
@section('developer-user-active', 'mm-active')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Developer User Management
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('admin.developer-user.create') }}"> <i class="fas fa-plus-circle"></i>
            Create
            Developer User
        </a>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderd DataTables">
                    <thead>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>IP Addr</th>
                        <th>User Agent</th>
                        <th>Login At</th>
                        <th>Created At</th>
                        <th>Action</th>
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
                ajax: "/admin/developer-user/datatables/ssd",
                columns: [
                    {
                        data: 'profile_photo',
                        name: 'profile_photo'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'ip',
                        name: 'ip',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'user_agent',
                        name: 'user_agent',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'login_at',
                        name: 'login_at',
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'action',
                        name: 'action'
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
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/developer-user/' + id,
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
