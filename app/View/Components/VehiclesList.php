<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VehiclesList extends Component
{

    public $vehicles;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vehicles)
    {
        $this->vehicles = $vehicles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.vehicles.partials.vehicles-list');
    }
}
