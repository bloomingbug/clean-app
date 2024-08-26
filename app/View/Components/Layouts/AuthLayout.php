<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public string $title;
    public array $vite = ['resources/js/app.js'];
    public function __construct(string $title = null, array $vite = [])
    {
        $this->title = $title;
        $this->vite = array_merge($this->vite, $vite);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.auth-layout');
    }
}
