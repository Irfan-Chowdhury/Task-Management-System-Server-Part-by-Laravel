<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Services\ProjectService;


class ProjectController extends Controller
{
    public function __construct(private ProjectService $projectService)
    {
    }

    public function index()
    {
        $projects = $this->projectService->getAllData();

        return view('pages.projects.index', compact('projects'));
    }

    public function datatable()
    {
        return $this->projectService->yajraDataTable();
    }

    public function store(StoreProjectRequest $request)
    {
        $result = $this->projectService->createProject($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function edit($projectId)
    {
        $result = $this->projectService->getProjectById($projectId);

        return response()->json($result);
    }

    public function update(UpdateProjectRequest $request, $projectId)
    {
        $result = $this->projectService->updateProject($request, $projectId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function destroy($projectId)
    {
        $result = $this->projectService->removeProject($projectId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
