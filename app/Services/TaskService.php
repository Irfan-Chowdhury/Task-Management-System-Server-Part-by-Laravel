<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TaskStatusEnum;
use App\Facades\Alert;
use App\Models\Task;
use Exception;

class TaskService
{
    public function getAllData(): ?object
    {
        return Task::with('project:id,name,code')
            ->select('id','project_id', 'name', 'description', 'status')
            ->orderBy('id','DESC')
            ->get();
    }

    public function yajraDataTable()
    {
        if (request()->ajax()) {
            $tasks = self::getAllData();

            return datatables()->of($tasks)
                ->setRowId(function ($row) {
                    return $row->id;
                })
                ->addColumn('project_code', function ($row) {
                    return $row->project->code;
                })
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('status', function ($row) {

                    $badgeColor = '';
                    if($row->status === "Pending"){
                        $badgeColor = 'primary';
                    }else if($row->status === "Working"){
                        $badgeColor = 'warning';
                    }else if($row->status === "Done"){
                        $badgeColor = 'success';
                    }
                    return "<span class='p-2 badge badge-". $badgeColor . "'>" . $row->status . "</span>";
                })
                ->addColumn('action', function ($row) {
                    $button = '<button type="button" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i>Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i>Delete</button>';

                    return $button;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
    }

    public function createTask(object $request): array
    {
        try {
            Task::create([
                'project_id' => $request->project_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return Alert::successMessage('Data Saved Successfully');

        } catch (Exception $exception) {

            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function getTaskById(int $taskId): object
    {
        return Task::with('project:id,name,code')
                ->select('id', 'project_id', 'name', 'description','status')
                ->find($taskId);
    }

    public function removeTask(int $taskId): array
    {
        try {
            $this->getTaskById($taskId)->delete();

            return Alert::successMessage('Data Deleted Successfully');

        } catch (Exception $exception) {

            return Alert::errorMessage($exception->getMessage());
        }
    }
}
