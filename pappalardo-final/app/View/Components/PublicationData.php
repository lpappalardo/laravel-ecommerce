<?php

namespace App\View\Components;

use App\Models\Publication;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublicationData extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Publication $publication,
        public int $headingStart = 1,  
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.publication-data');
    }
}
