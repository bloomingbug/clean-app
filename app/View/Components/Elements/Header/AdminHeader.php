<?php

namespace App\View\Components\Elements\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminHeader extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.header.admin-header');
    }
}
