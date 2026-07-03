<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardCard extends Component
{
    public $title;
    public $value;

    public function __construct($title = '', $value = 0)
    {
        $this->title = $title;
        $this->value = $value;
    }

    public function render(): View
    {
        return view('components.dashboard-card');
    }
}