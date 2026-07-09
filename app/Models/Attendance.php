<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;


    protected $fillable = [
        'intern_id',
        'date',
        'check_in',
        'check_out',
        'status',
        'remarks',
    ];


    /**
     * Attendance belongs to an intern
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }


    /**
     * Check if intern was late
     */
    public function isLate()
    {
        return $this->status === 'Late';
    }


    /**
     * Check if attendance is complete
     */
    public function isCompleted()
    {
        return !is_null($this->check_out);
    }
}