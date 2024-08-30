<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserLayout extends Component
{
    public string $title = '';
    public string $description = '';

    public array $vite = ['resources/js/app.js', 'resources/js/components/layouts/user.js'];
    public function __construct(string $title = null, string $description = null, array $vite = [])
    {
        $this->title = $title;
        $this->description = $description;
        $this->vite = array_merge($this->vite, $vite);
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.user-layout');
    }
}
