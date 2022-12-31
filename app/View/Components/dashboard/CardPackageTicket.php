<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class CardPackageTicket extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $periods;
    public function __construct(
        $name,
        $periods,
    ) {
        $this->name = $name;
        $this->periods = $periods;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.card-package-ticket');
    }
}
