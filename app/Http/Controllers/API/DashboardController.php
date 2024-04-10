<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\DashboardResource;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function dashboard(ProjectService $projectService ,TaskService $taskService)
    {
        $totalTaskForMember = 0;
        $totalProjet = $projectService->totalProjet();

        $taskStatus = $taskService->taskStatus();

        // if(!auth()->user()->can('task-view-all'))
        //     $totalTaskForMember = $taskService->getDataForSingleMember()->count();

        // return response()->json([
        //     'totalProjet' => $totalProjet,
        //     'taskStatus' => $taskStatus,
        //     'totalTaskForMember' => $totalTaskForMember
        // ]);

        return $this->sendResponse([
            'totalProjet' => $totalProjet,
            'taskStatus' => $taskStatus,
            'totalTaskForMember' => $totalTaskForMember
        ], 'Data retrieved successfully.');
    }
}
