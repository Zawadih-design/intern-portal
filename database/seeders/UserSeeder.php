<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Supervisor;
use App\Models\Intern;
use App\Models\Department;
use App\Models\University;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first department and university
        $department = Department::first();
        $university = University::first();
        
        // Create users for supervisors
        $supervisorUsers = User::factory()->count(2)->create();
        
        $supervisorIds = [];
        
        // Create supervisors
        foreach ($supervisorUsers as $user) {
            $user->assignRole('Supervisor');
            
            $supervisor = Supervisor::create([
                'user_id' => $user->id,
                'department_id' => $department->id,
                'position' => 'Supervisor',
                'phone' => '123-456-7890',
            ]);
            
            $supervisorIds[] = $supervisor->id;
        }
        
        // Create users for interns
        $internUsers = User::factory()->count(3)->create();
        
        // Create interns
        foreach ($internUsers as $user) {
            $user->assignRole('Intern');
            
            Intern::create([
                'user_id' => $user->id,
                'university_id' => $university->id,
                'department_id' => $department->id,
                'supervisor_id' => $supervisorIds[0] ?? null,
                'student_number' => 'STU' . rand(1000, 9999),
                'programme' => 'Computer Science',
                'year_of_study' => 3,
                'phone' => '098-765-4321',
                'emergency_contact' => 'Emergency Contact',
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'status' => 'active',
            ]);
        }
    }
}