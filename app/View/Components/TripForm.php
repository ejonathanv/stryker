<?php

namespace App\View\Components;

use App\Models\Group;
use Illuminate\View\Component;

class TripForm extends Component
{

    public $title;
    public $type;
    public $trip;
    
    public function route(){
        if($this->type == 'post'){
            return route('trips.store');
        }elseif($this->type == 'update'){
            return route('trips.update', $this->trip->id);
        }
    }

    public function groups(){
        $groups = Group::orderBy('name')->get();
        return $groups;
    }


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
