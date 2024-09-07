<?php

namespace App\View\Components\Elements\Card;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Act extends Component
{
    public $title;

    public $cover;

    public $slug;

    public $date;

    public $city;

    public $province;

    public $location;

    public $total;

    public $isClosed;

    public function __construct($title, $cover, $slug, $date, $city, $province, $total)
    {
        $this->title = $title;
        $this->cover = $cover;
        $this->slug = $slug;
        $this->date = Carbon::parse($date)->translatedFormat('d F Y');
        $this->city = $city;
        $this->province = $province;
        $this->location = $city.', '.$province;
        $this->total = $total;
        $this->isClosed = Carbon::parse($date)->isPast();
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.card.act');
    }
}
