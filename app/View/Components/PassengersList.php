<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PassengersList extends Component
{

    public $passengers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($passengers)
    {
        $this->passengers = $passengers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.passengers.partials.passengers-list');
    }
}
