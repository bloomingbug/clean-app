<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    public string $title;

    public array $vite = ['resources/js/app.js', 'resources/js/components/navBar.js'];

    public function __construct(?string $title = null, array $vite = [])
    {
        $this->title = $title;
        $this->vite = array_merge($this->vite, $vite);
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.auth-layout');
    }
}
