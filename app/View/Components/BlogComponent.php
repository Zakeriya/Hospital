<?php

namespace App\View\Components;

use Closure;
use App\Models\Blog;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BlogComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $blogs;
    // public $count;
    public function __construct($blogs)
    {
        // $this->count=$count;
        $this->blogs=$blogs;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-component');
    }
}
