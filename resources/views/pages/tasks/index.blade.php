@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tasks</h1>

    @include('common-files.session_message')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="row">
                    @can('task-create')
                    <div class="col-md-4">
                        <button class="btn btn-primary font-weight-bold" type="button" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Create Task</button>
                    </div>
                    @endcan
                    <div class="col-md-4">
                        <label for=""><b>Project Code</b></label>
                        <select name="project_id" id="projectCode" class="form-control">
                            <option value="">-- Select Project Code--</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Status</b></label>
                        <select name="status" id="status" class="form-control">
                            <option value="">-- Select Status --</option>
                            <option value="Pending">Pending</option>
                            <option value="Working">Working</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                </div>


            </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="dataListTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project Code</th>
                            <th>Task Name</th>
                            <th>Status</th>
                            <th>Assigned To</th>
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

        var table = $('#dataListTable').DataTable({
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: dataTableURL,
                data: function (d) {
                    d.project_id = $('#projectCode').val()
                    d.status = $('#status').val()
                }
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
                    data: 'assigned_to',
                    name: 'assigned_to',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                }
            ],
        });

        $('#projectCode').change(function(){
            table.draw();
        });
        $('#status').change(function(){
            table.draw();
        });
    });



    //--------- Edit -------
    $(document).on('click', '.edit', function() {
        let id = $(this).data("id");
        $.get({
            url: editURL + id,
            success: function(response) {
                // console.log(response.users[0].id);

                $("#editModal input[name='task_id']").val(response.id);
                $("#editModal select[name='project_id']").val(response.project_id);
                $("#editModal input[name='name']").val(response.name);
                $("#editModal textarea[name='description']").val(response.description);
                $("#editModal select[name='status']").val(response.status);
                if (typeof response !== 'undefined' && response.users && response.users.length > 0 && typeof response.users[0].id !== 'undefined') {
                    $("#editModal select[name='user_id']").val(response.users[0].id);
                }
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
