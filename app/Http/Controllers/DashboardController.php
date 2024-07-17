<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use App\Services\TaskService;

class DashboardController extends Controller
{
    public function dashboard(ProjectService $projectService ,TaskService $taskService)
    {
        $totalTaskForMember = 0;
        $totalProjet = $projectService->totalProjet();

        $taskStatus = $taskService->taskStatus();

        if(!auth()->user()->can('task-view-all'))
            $totalTaskForMember = $taskService->getDataForSingleMember()->count();

        return view('pages.dashboard', compact('totalProjet','taskStatus','totalTaskForMember'));
    }
}
