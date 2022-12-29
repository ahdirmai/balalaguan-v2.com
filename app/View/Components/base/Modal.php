<?php

namespace App\View\Components\base;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $modalId;

    public function __construct($title = '', $modalId = '')
    {
        //
        $this->title = $title;
        $this->modalId = $modalId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.modal');
    }
}
