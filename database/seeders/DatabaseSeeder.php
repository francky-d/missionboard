<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Mission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Mission::factory(10)->create();
        Application::factory(50)->create();
    }
}
