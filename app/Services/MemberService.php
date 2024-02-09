<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberService
{
    public function getData(): ?object
    {
        return User::select('id', 'name', 'email', 'employee_id', 'position')
            ->where('role_id', UserRoleEnum::TEAMMATE)
            ->orderBy('id','DESC')
            ->get();

    }

    public function createTeamMember(object $request): void
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'position' => $request->position,
            'role_id' => UserRoleEnum::TEAMMATE,
            'password' => Hash::make($request->password),
        ]);
    }

    public function updateTeamMember(object $request, int $memberId): void
    {
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

        User::where('id', $memberId)->update($data);
    }

    public function deleteTeamMember(int $memberId): void
    {
        User::find($memberId)->delete();
    }
}
