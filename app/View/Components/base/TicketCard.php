<?php

namespace App\View\Components\base;

use Illuminate\View\Component;

class TicketCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $category;
    public $isCheckIn;
    public $fullname;
    public $date;
    public $telephone;
    public $email;
    public $qrcode;
    
    public function __construct(
        $id = 1 ,$category = 'VIP', $isCheckIn = false, $fullname = 'Fulan bin Fulan', $date = 'now', $telephone = '098756843829', $email = 'fulan909909@yahoo.com', $qrcode = ''
    )
    {
        //
        $this->id = $id;
        $this->category = $category;
        $this->isCheckIn = $isCheckIn;
        $this->fullname = $fullname;
        $this->date = $date;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->qrcode = $qrcode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.ticket-card');
    }
}
