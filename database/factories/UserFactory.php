<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            'email' => 'admin@gmail.com',
            'employee_id' => Str::random(3),
            'position' => 'Admin',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' =>  Hash::make('admin'),
            'remember_token' => Str::random(10),
        ];
    }
}
