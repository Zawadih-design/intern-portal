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

    // Relationship: Supervisor belongs to Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}