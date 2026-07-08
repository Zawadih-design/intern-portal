<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [

        'intern_id',

        'supervisor_id',

        'title',

        'description',

        'priority',

        'status',

        'deadline',

        'completed_at'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}