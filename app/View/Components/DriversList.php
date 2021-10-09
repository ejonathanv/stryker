<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DriversList extends Component
{

    public $drivers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($drivers)
    {
        $this->drivers = $drivers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.drivers.partials.drivers-list');
    }
}
