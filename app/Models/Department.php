<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'description'];

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }
    public function tasks()
{
    return $this->hasMany(Task::class);
}
}