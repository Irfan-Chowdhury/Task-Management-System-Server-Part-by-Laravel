<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::insert([
            [
                'name' => 'ProplePro HRM',
                'code' => 'P-123'
            ],
            [
                'name' => 'CartPro E-commerce',
                'code' => 'P-456',
            ]
        ]);
    }
}
