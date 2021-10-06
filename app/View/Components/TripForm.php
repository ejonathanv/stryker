<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TripForm extends Component
{

    public $title;
    public $type;
    public $trip;
    public $route;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trip = null, $title, $type = 'post')
    {
        $this->trip = $trip;
        $this->title = $title;
        $this->type = $type;

        if($this->type == 'post'){
            $this->route = route('trips.store');
        }elseif($this->type == 'update'){
            $this->route = route('trips.update', $this->trip->id);
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.trips.partials.trip-form');
    }
}
