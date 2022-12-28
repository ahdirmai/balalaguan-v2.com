<?php

namespace App\View\Components\base;

use Illuminate\View\Component;

class ModalConfirm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $subTitle;
    public $modalId;

    public function __construct($title = 'Title Here', $subTitle = 'Sub title here', $modalId = 'ModalId')
    {
        //
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->modalId = $modalId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.modal-confirm');
    }
}
