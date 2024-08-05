<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    // protected string $route;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $route)
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link', [
            'route' => $this->route,
        ]);
    }
}