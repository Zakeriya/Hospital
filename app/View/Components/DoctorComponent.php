<?php

namespace App\View\Components;

use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DoctorComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $doctors ;
    public $count;
    public $text;
    public function __construct($count ,$text)
    {
        $this->count=$count;
        $this->text=$text;
        $this->doctors =Doctor::where('status','accepted')->paginate($count);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.doctor-component');
    }
}
