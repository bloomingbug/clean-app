<?php

namespace App\View\Components\Elements\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminNav extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.nav.admin-nav');
    }
}
