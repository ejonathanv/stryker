<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VehicleForm extends Component
{

    public $title;
    public $vehicle;
    public $type;

    public function route(){
        if($this->type == 'post'){
            return route('vehicles.store');
        }elseif($this->type == 'update'){
            return route('vehicles.update', $this->vehicle);
        }
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $vehicle = null, $type = 'post')
    {
        $this->title = $title;
        $this->vehicle = $vehicle;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.vehicles.partials.vehicle-form');
    }
}
