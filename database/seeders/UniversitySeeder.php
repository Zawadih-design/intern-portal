<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        University::create([
            'name' => 'University of Zambia',
            'country' => 'Zambia',
            'city' => 'Lusaka',
        ]);

        University::create([
            'name' => 'Copperbelt University',
            'country' => 'Zambia',
            'city' => 'Kitwe',
        ]);
    }
}
