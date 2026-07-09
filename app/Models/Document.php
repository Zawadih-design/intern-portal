<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;


    protected $fillable = [

        'user_id',

        'title',

        'type',

        'file_path',

        'status',

        'comments',

    ];



    /**
     * Document belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    /**
     * Check approval status
     */
    public function isApproved()
    {
        return $this->status === 'Approved';
    }



    public function isPending()
    {
        return $this->status === 'Pending';
    }
}