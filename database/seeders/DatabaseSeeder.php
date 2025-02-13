<?php

namespace Database\Seeders;

use App\Models\Task;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        Task::factory()->count(10)->create();
    }
}