<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceReview extends Model
{
    use HasFactory;


    protected $fillable = [

        'intern_id',
        'supervisor_id',

        'technical_score',
        'communication_score',
        'teamwork_score',
        'problem_solving_score',
        'professionalism_score',

        'overall_score',

        'comments',

        'review_date',

    ];



    /**
     * Review belongs to an intern
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }



    /**
     * Review belongs to a supervisor
     */
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }



    /**
     * Calculate average score
     */
    public static function calculateScore(array $scores)
    {
        return round(
            array_sum($scores) / count($scores)
        );
    }

}