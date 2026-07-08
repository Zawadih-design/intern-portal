<?php

namespace App\Observers;

use App\Models\Intern;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class InternObserver
{

    public function created(Intern $intern): void
    {

        ActivityLog::create([

            'user_id' => Auth::id(),

            'action' => 'created_intern',

            'description' =>
            'New intern registered: '
            . $intern->user->name

        ]);

    }


}