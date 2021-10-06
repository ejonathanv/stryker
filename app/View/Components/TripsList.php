<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TripsList extends Component
{

    public $trips;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trips)
    {
        $this->trips = $trips;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.trips.partials.trips-list');
    }
}
