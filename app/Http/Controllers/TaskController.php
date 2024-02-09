<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
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

    // public function edit($projectId)
    // {
    //     $result = $this->taskService->getProjectById($projectId);

    //     return response()->json($result);
    // }

    // public function update(UpdateProjectRequest $request, $projectId)
    // {
    //     $result = $this->taskService->updateProject($request, $projectId);

    //     return response()->json($result['alertMsg'], $result['statusCode']);
    // }

    public function destroy($taskId)
    {
        $result = $this->taskService->removeTask($taskId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
