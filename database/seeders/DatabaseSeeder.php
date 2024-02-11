<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Single : php artisan db:seed --class=RoleSeeder


        $this->call([
            RoleSeeder::class,
            ManagerSeeder::class,
            MemberSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            TaskUserSeeder::class,
        ]);
    }
}
