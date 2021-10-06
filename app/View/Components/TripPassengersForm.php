<?php

namespace App\View\Components;

use App\Models\Passenger;
use Illuminate\View\Component;

class TripPassengersForm extends Component
{

    public $title;
    public $trip;

    public function passengers(){
        $passengers = Passenger::orderBy('first_name')->get();
        return $passengers;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $trip)
    {
        $this->title = $title;
        $this->trip = $trip;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.trips.partials.trip-passengers-form');
    }
}
