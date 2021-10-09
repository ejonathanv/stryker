<?php
namespace App\View\Components;
use Illuminate\View\Component;
class GroupForm extends Component
{
    public $group;
    public $type;

    public function route(){
        if($this->type == 'post'){
            return route('groups.store');
        }elseif($this->type == 'update'){
            return route('groups.update', $this->group);
        }
    }
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($group = null, $type = 'post')
    {
        $this->group = $group;
        $this->type = $type;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app.groups.partials.group-form');
    }
}