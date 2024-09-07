<?php

namespace App\View\Components\Elements\Card;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Donation extends Component
{
    public $title;

    public $cover;

    public $slug;

    public $totalFund;

    public $targetFund;

    public $percentage;

    public $date;

    public $city;

    public $province;

    public $location;

    public function __construct($title, $cover, $slug, $totalFund, $targetFund, $date, $city, $province)
    {
        $this->title = $title;
        $this->cover = $cover;
        $this->slug = $slug;
        $this->totalFund = number_format($totalFund, 0, ',', '.');
        $this->targetFund = number_format($targetFund, 0, ',', '.');
        $this->percentage = $totalFund >= $targetFund ? 100 : ($totalFund / $targetFund) * 100;
        $this->date = Carbon::parse($date)->translatedFormat('d F Y');
        $this->city = $city;
        $this->province = $province;
        $this->location = $city.', '.$province;
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.card.donation');
    }
}
