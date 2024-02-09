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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        @foreach ($teamMembers as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->employee_id }}</td>
                                <td>{{ $member->position }}</td>
                                <td>
                                    <button class="btn btn-info p-2" type="button" data-toggle="modal" data-target="#editModal-{{ $member->id }}">Edit</button>
                                    <a onclick="return confirm('Are you sure delete ?')" href="{{ route('team-members.destroy',$member->id) }}" class="btn btn-danger p-2">Delete</a>
                                </td>
                            </tr>

                            @include('pages.team-members.edit-modal',['member'=>$member])

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('pages.team-members.create-modal')


@endsection

@push('scripts')

@if(session()->has('success'))
    <script>
        $(document).ready(function() {
            displaySuccessMessage('{{ Session::get('success') }}');
        });
    </script>
@endif
<script type="text/javascript" src="{{ asset('js/common-js/alertMessages.js') }}"></script>
@endpush
