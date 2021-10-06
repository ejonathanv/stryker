<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Driver;
use App\Models\Vehicle;

class TripDriversForm extends Component
{

    public $trip;
    public $title;
    public $tripDriver;


    public function drivers(){
        $drivers = Driver::all();
        return $drivers;
    }

    public function vehicles(){
        $vehicles = Vehicle::orderBy('brand')->get();
        return $vehicles;
    }

    public function tripDriver(){
        $driver = $this->trip->drivers->first();
        return $driver;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trip, $title)
    {
        $this->trip = $trip;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.trips.partials.trip-drivers-form');
    }
}
