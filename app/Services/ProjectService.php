<?php

declare(strict_types=1);

namespace App\Services;

use App\Facades\Alert;
use App\Models\Project;
use Exception;

class ProjectService
{
    public function getAllData(): ?object
    {
        return Project::select('id', 'name', 'code')
            ->get();
    }

    public function yajraDataTable()
    {
        if (request()->ajax()) {
            $projects = self::getAllData();

            return datatables()->of($projects)
                ->setRowId(function ($row) {
                    return $row->id;
                })
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('code', function ($row) {
                    return $row->code;
                })
                ->addColumn('action', function ($row) {
                    $button = '<button type="button" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i>Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i>Delete</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createProject(object $request): array
    {
        try {
            Project::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);

            return Alert::successMessage('Data Saved Successfully');

        } catch (Exception $exception) {

            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function getProjectById(int $projectId): object
    {
        return Project::select('id', 'name', 'code')->find($projectId);
    }

    public function updateProject(object $request, int $projectId): array
    {
        try {
            Project::where('id', $projectId)
                ->update([
                    'name' => $request->name,
                    'code' => $request->code,
                ]);

            return Alert::successMessage('Data Updated Successfully');

        } catch (Exception $exception) {

            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function removeProject(int $projectId): array
    {
        try {
            $this->getProjectById($projectId)->delete();

            return Alert::successMessage('Data Deleted Successfully');

        } catch (Exception $exception) {

            return Alert::errorMessage($exception->getMessage());
        }
    }
}
