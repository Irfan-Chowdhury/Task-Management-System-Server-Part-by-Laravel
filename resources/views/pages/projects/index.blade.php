@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Projects</h1>

    @include('common-files.session_message')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Create Project</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataListTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Project Code</th>
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

@include('pages.projects.create-modal')
@include('pages.projects.edit-modal')

@endsection

@push('scripts')

<script type="text/javascript">
    let dataTableURL = "{{ route('projects.datatable') }}";
    let storeURL = "{{ route('projects.store') }}";
    let editURL = "/projects/edit/";
    let updateURL = '/projects/update/';
    let destroyURL = '/projects/destroy/';

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
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'code',
                    name: 'code',
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
                $("#editModal input[name='project_id']").val(response.id);
                $("#editModal input[name='name']").val(response.name);
                $("#editModal input[name='code']").val(response.code);
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
