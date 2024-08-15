<?php

namespace App\View\Components;

use Closure;
use App\Models\Doctor;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AppointmentComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $doctors;
    public function __construct()
    {
        $this->doctors=Doctor::all();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appointment-component');
    }
}
