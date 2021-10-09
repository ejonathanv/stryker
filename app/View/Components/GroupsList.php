<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupsList extends Component
{

    public $groups;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($groups)
    {
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.groups.partials.groups-list');
    }
}
