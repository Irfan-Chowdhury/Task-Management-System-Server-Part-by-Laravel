<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\UserRoleEnum;
use App\Facades\Alert;
use App\Models\User;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Hash;

class MemberService
{
    use ApiResponse;

    public function getAllData(): ?object
    {
        return User::select('id', 'name', 'email', 'employee_id', 'position')
            ->where('role_id', UserRoleEnum::TEAMMATE)
            ->orderBy('id', 'DESC')
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
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
                ->addColumn('employee_id', function ($row) {
                    return $row->employee_id;
                })
                ->addColumn('position', function ($row) {
                    return $row->position;
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

    public function createTeamMember(object $request): object
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'employee_id' => $request->employee_id,
                'position' => $request->position,
                'role_id' => UserRoleEnum::TEAMMATE,
                'password' => Hash::make($request->password),
            ]);

            return $this->success('Team Data Saved Successfully');

        } catch (Exception $exception) {

            return $this->error($exception->getMessage());
            // return Alert::errorMessage($exception->getMessage());
        }
    }

    public function getMemberById(int $memberId): object
    {
        return User::select('id', 'name', 'email', 'employee_id', 'position')->find($memberId);
    }

    public function updateTeamMember(object $request, int $memberId): object
    {
        try {

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'employee_id' => $request->employee_id,
                'position' => $request->position,
                'role_id' => UserRoleEnum::TEAMMATE,
            ];

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            self::getMemberById($memberId)
                ->update($data);

            return $this->success('Data Updated Successfully');

        } catch (Exception $exception) {

            return $this->error($exception->getMessage());
        }
    }

    public function deleteTeamMember(int $memberId): array|object
    {
        try {
            $this->getMemberById($memberId)->delete();

            // return Alert::successMessage('Data Deleted Successfully');

            return $this->success('Member Deleted Successfully');

        } catch (Exception $exception) {

            return $this->error($exception->getMessage());
            // return Alert::errorMessage($exception->getMessage());
        }
    }
}
