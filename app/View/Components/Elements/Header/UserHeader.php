<?php

namespace App\View\Components\Elements\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserHeader extends Component
{
    public $user;
    public string | null $title;
    public string | null $description;
    public function __construct(string $title = null, string $description = null)
    {
        $this->title = $title;
        $this->user = auth()->user();
        $this->description = $description;
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.header.user-header');
    }
}
