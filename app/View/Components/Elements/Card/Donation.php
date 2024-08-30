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
    public function __construct($title, $cover, $slug, $totalFund = 0, $targetFund = 0, $date, $city, $province)
    {
        $this->title = $title;
        $this->cover = $cover;
        $this->slug = $slug;
        $this->totalFund = $totalFund;
        $this->targetFund = $targetFund;
        $this->percentage = $totalFund >= $targetFund ? '100' : ($totalFund * $targetFund / 100) * 100;
        $this->date = Carbon::parse($date)->translatedFormat('d F Y');
        $this->city = $city;
        $this->province = $province;
        $this->location = $city . ', ' . $province;
    }

    public function render(): View|Closure|string
    {
        return view('components.elements.card.donation');
    }
}
