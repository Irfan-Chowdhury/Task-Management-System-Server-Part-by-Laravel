<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => "Member1",
                'email' => "member123@gmail.com",
                'employee_id' => "B-123",
                'position' => "Software Engineer",
                'role_id' => UserRoleEnum::TEAMMATE,
                'password' => Hash::make("member123"),
            ],
            [
                'name' => "Member2",
                'email' => "member456@gmail.com",
                'employee_id' => "B-456",
                'position' => "Web Designer",
                'role_id' => UserRoleEnum::TEAMMATE,
                'password' => Hash::make("member456"),
            ]
        ]);
    }
}
