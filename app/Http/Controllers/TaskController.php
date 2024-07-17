<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\MemberService;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }

    public function index(ProjectService $projectService, MemberService $memberService)
    {
        $projects = $projectService->getAllData();
        $members = $memberService->getAllData();

        return view('pages.tasks.index', compact('projects', 'members'));
    }

    public function datatable(Request $request)
    {
        return $this->taskService->yajraDataTable($request);
    }

    public function store(StoreTaskRequest $request)
    {
        $result = $this->taskService->createTask($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function show($taskId)
    {
        if (! auth()->user()->can('task-view-all') && ! $this->taskService->isAuthorized($taskId)) {
            return abort(403, 'You are not Authorized');
        }

        $task = $this->taskService->getTaskById($taskId);

        return view('pages.tasks.show', compact('task'));
    }

    public function changeStatus($taskId, $status)
    {
        $result = $this->taskService->statusChange($taskId, $status);

        return redirect()->back()->with($result['alertMsg']);
    }

    public function edit($taskId)
    {
        $result = $this->taskService->getTaskById($taskId);

        return response()->json($result);
    }

    public function update(UpdateTaskRequest $request, $taskId)
    {
        $result = $this->taskService->updateTask($request, $taskId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function destroy($taskId)
    {
        $result = $this->taskService->removeTask($taskId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
