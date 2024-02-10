<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $projectService)
    {
    }

    public function index(Project $project)
    {
        $this->authorize('viewProject', $project);

        $projects = $this->projectService->getAllData();

        return view('pages.projects.index', compact('projects'));
    }

    public function datatable(Request $request)
    {
        return $this->projectService->yajraDataTable($request);
    }

    public function store(StoreProjectRequest $request, Project $project)
    {
        $this->authorize('createProject', $project);

        $result = $this->projectService->createProject($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function edit($projectId)
    {
        $result = $this->projectService->getProjectById($projectId);

        return response()->json($result);
    }

    public function update(UpdateProjectRequest $request, $projectId, Project $project)
    {
        $this->authorize('updateProject', $project);

        $result = $this->projectService->updateProject($request, $projectId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function destroy($projectId, Project $project)
    {
        $this->authorize('deleteProject', $project);

        $result = $this->projectService->removeProject($projectId);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
