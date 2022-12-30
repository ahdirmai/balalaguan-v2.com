<?php

namespace App\View\Components\base;

use Illuminate\View\Component;

class HeaderNavigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    
    public function __construct($title = 'Title goes here')
    {
        //
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.header-navigation');
    }
}
