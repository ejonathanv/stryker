<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DriverForm extends Component
{

    public $title;
    public $type;
    public $driver;

    public function route(){
        if($this->type == 'post'){
            return route('drivers.store');
        }elseif($this->type = 'update'){
            return route('drivers.update', $this->driver);
        }
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $type = 'post', $driver = null)
    {
        $this->title = $title;
        $this->type = $type;
        $this->driver = $driver;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.drivers.partials.driver-form');
    }
}
