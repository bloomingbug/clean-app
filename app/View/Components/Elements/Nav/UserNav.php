<?php

namespace App\View\Components\Elements\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserNav extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('components.elements.nav.user-nav');
    }
}
