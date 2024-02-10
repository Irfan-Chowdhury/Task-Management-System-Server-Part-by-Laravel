@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tasks</h1>

    @include('common-files.session_message')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Create Task</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataListTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project Code</th>
                            <th>Task Name</th>
                            <th>Status</th>
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

@include('pages.tasks.create-modal')
@include('pages.tasks.edit-modal')

@endsection

@push('scripts')

<script type="text/javascript">
    let dataTableURL = "{{ route('tasks.datatable') }}";
    let storeURL = "{{ route('tasks.store') }}";
    let editURL = "/tasks/edit/";
    let updateURL = '/tasks/update/';
    let destroyURL = '/tasks/destroy/';

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataListTable').DataTable({
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: dataTableURL,
            },
            columns: [
                {
                    data: 'project_code',
                    name: 'project_code',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'status',
                    name: 'status',
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
                $("#editModal input[name='task_id']").val(response.id);
                $("#editModal select[name='project_id']").val(response.project_id);
                $("#editModal input[name='name']").val(response.name);
                $("#editModal textarea[name='description']").val(response.description);
                $("#editModal select[name='status']").val(response.status);
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
