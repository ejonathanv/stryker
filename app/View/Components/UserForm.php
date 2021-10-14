<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserForm extends Component
{

    public $title;
    public $type;
    public $user;

    public function route(){
        if($this->type == 'post'){
            return route('users.store');
        }elseif($this->type == 'update'){
            return route('users.update', $this->user);
        }
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $user = null, $type = 'post')
    {
        $this->title = $title;
        $this->type = $type;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.users.partials.user-form');
    }
}
