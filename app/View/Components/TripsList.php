<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TripsList extends Component
{

    public $title;
    public $subtitle;
    public $trips;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trips, $title = 'Viajes', $subtitle = 'Lista de todos los viajes registrados.')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
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
