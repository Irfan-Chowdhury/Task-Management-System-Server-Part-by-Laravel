<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }

    public function index(ProjectService $projectService)
    {
        $projects = $projectService->getAllData();

        return view('pages.tasks.index', compact('projects'));
    }

    public function datatable()
    {
        return $this->taskService->yajraDataTable();
    }

    public function store(StoreTaskRequest $request)
    {
        $result = $this->taskService->createTask($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
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
