<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TripPdf extends Component
{

    public $trip;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trip)
    {
        $this->trip = $trip;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trip-pdf');
    }
}
