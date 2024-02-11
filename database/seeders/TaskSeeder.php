<?php

namespace Database\Seeders;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.';

        Task::insert([
            [
                'project_id' => 1,
                'name' => 'Template Design Setup',
                'description' => $description,
                'status' => TaskStatusEnum::PENDING
            ],
            [
                'project_id' => 1,
                'name' => 'Authentication Setup',
                'description' => $description,
                'status' => TaskStatusEnum::WORKING
            ],
            [
                'project_id' => 1,
                'name' => 'Database Design',
                'description' => $description,
                'status' => TaskStatusEnum::DONE
            ],
            [
                'project_id' => 2,
                'name' => 'Create Category and Product',
                'description' => $description,
                'status' => TaskStatusEnum::WORKING
            ],
            [
                'project_id' => 2,
                'name' => 'Report Generate',
                'description' => $description,
                'status' => TaskStatusEnum::PENDING
            ],

        ]);
    }
}
