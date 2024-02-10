@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Team Members</h1>

    @include('common-files.session_message')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Create Member</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataListTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Employee Id</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('pages.team-members.create-modal')
@include('pages.team-members.edit-modal')


@endsection

@push('scripts')

<script type="text/javascript">
    let dataTableURL = "{{ route('team-members.datatable') }}";
    let storeURL = "{{ route('team-members.store') }}";
    let editURL = "/team-members/edit/";
    let updateURL = '/team-members/update/';
    let destroyURL = '/team-members/destroy/';

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#dataListTable').DataTable({
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: dataTableURL
            },
            columns: [
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'employee_id',
                    name: 'employee_id',
                },
                {
                    data: 'position',
                    name: 'position',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                }
            ],
        });

    });

    //--------- Edit -------
    $(document).on('click', '.edit', function() {
        let id = $(this).data("id");
        $.get({
            url: editURL + id,
            success: function(response) {
                console.log(response);
                $("#editModal input[name='user_id']").val(response.id);
                $("#editModal input[name='name']").val(response.name);
                $("#editModal input[name='email']").val(response.email);
                $("#editModal input[name='employee_id']").val(response.employee_id);
                $("#editModal input[name='position']").val(response.position);
                $('#editModal').modal('show');
            }
        })
    });
</script>
<script type="text/javascript" src="{{ asset('js/common-js/store.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common-js/update.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common-js/delete.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common-js/alertMessages.js') }}"></script>

@endpush
