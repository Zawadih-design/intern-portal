<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('departments')->insert([
            [
                'name' => 'ICT',
                'description' => 'Information and Communication Technology',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Human Resources',
                'description' => 'Handles staff and intern coordination',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Finance',
                'description' => 'Manages budgeting and payments',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Engineering',
                'description' => 'Technical operations and infrastructure',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}