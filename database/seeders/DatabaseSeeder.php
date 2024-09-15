<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         \App\Models\User::factory()->create();

        \App\Models\Company::factory(50)->create();
        \App\Models\Employee::factory(200)->create();
    }
}
