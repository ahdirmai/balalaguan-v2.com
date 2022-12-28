<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class CardWidget extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $cardTitle;
    public $cardSubtitle;
    public $cardColour;
    public $useDropdown;
    
    public function __construct(
        $cardTitle = 'Title here', $cardSubtitle = 'Sub Title here', 
        $cardColour = 'bg-primary',
        $useDropdown = false
    )
    {
        $this->cardTitle = $cardTitle;
        $this->cardSubtitle = $cardSubtitle;
        $this->cardColour = $cardColour;
        $this->useDropdown = $useDropdown;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.card-widget');
    }
}
