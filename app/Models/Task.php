<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'supervisor_id',
        'title',
        'description',
        'priority',
        'status',
        'deadline',
        'completed_at',
    ];

    /**
     * A task belongs to one intern.
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    /**
     * A task belongs to one supervisor.
     */
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    /**
     * Scope: Only pending tasks.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    /**
     * Scope: Completed tasks.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'Completed');
    }

    /**
     * Check if task is overdue.
     */
    public function isOverdue()
    {
        return $this->deadline < Carbon::today()
            && $this->status !== 'Completed';
    }

    /**
     * Check if task is finished.
     */
    public function isFinished()
    {
        return in_array($this->status, [
            'Approved',
            'Completed'
        ]);
    }
}