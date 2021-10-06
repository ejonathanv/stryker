<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PassengerForm extends Component
{

    public $title;
    public $type;
    public $passenger;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $type = 'post', $passenger = null)
    {
        $this->title = $title;
        $this->type = $type;
        $this->passenger = $passenger;
    }

    public function route(){
        if($this->type == 'post'){
            return route('passengers.store');
        }elseif($this->type == 'update'){
            return route('passengers.update', $this->passenger);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.passengers.partials.passenger-form');
    }
}
