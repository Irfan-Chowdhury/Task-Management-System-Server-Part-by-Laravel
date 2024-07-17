<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_user')
        ->insert([
            [
                'task_id' => 1,
                'user_id' => 2
            ],
            [
                'task_id' => 2,
                'user_id' => 3
            ],
        ]);
    }
}
