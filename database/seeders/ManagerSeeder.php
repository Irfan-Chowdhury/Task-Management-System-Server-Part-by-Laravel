<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mister Manager',
            'email' => 'manager@gmail.com',
            'employee_id' => 'BAT-12345',
            'role_id' => UserRoleEnum::MANAGER,
            'password' => Hash::make('manager123'),
        ]);
    }
}
