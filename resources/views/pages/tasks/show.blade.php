@extends('layouts.master')
@section('content')
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Task Details</h1>

    @include('common-files.session_message')


    <div class="card">
        <div class="card-header">
            <b>Project Name :</b> {{ $task->project->name }} &nbsp;&nbsp; | &nbsp;&nbsp; <b>Project Code :</b> {{ $task->project->code }}
          </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Task Name : </b> {{ $task->name }}</li>
                <li class="list-group-item"><b>Task Details : </b> {{ $task->description }}</li>
                <li class="list-group-item"><b>Task Status : </b>
                    @if ($task->status === "Pending")
                        <span class='p-2 badge badge-primary'> {{ $task->status }} </span>
                    @elseif ($task->status === "Working")
                        <span class='p-2 badge badge-warning'> {{ $task->status }} </span>
                    @else
                        <span class='p-2 badge badge-success'> {{ $task->status }} </span>
                    @endif
                </li>
                <li class="list-group-item"><b>Assigned To :  </b>
                    @if (isset($task->users[0]->name))
                        <span class='p-2 badge badge-info'> {{ $task->users[0]->name }} </span>
                    @else
                        <span class='text-danger'> Not Assign Yet </span>
                    @endif
                </li>
            </ul>

            <div class="mt-5 btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Update your status
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('tasks.change-status',[$task->id,'Pending']) }}">Pending</a>
                    <a class="dropdown-item" href="{{ route('tasks.change-status',[$task->id,'Working']) }}">Working</a>
                    <a class="dropdown-item" href="{{ route('tasks.change-status',[$task->id,'Done']) }}">Done</a>
                </div>
            </div>
        </div>
      </div>
    @include('common-files.session_message')

</div>

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


