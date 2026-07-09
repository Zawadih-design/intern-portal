<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'position',
        'phone'
    ];

    // Relationship: Supervisor belongs to User (login account)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship: Supervisor has many Interns
    public function interns()
    {
        return $this->hasMany(Intern::class);
    }

    // Relationship: Supervisor has many Performance Reviews
    public function performanceReviews()
    {
        return $this->hasMany(PerformanceReview::class);
    }

    // Relationship: Supervisor has many Attendances through Interns
    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class, Intern::class);
    }

    // Relationship: Supervisor belongs to Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relationship: Supervisor has many Tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}