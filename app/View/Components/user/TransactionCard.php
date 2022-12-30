<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class TransactionCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $category;
    public $amount;
    public $timestamp;
    public $isVerified;
    public $isCheckIn;
    
    public function __construct(
        $id = 1, $category = 'VIP', $amount = 2, $timestamp = 'now', $isVerified = false, $isCheckIn = false
    )
    {
        //
        $this->id = $id;
        $this->category = $category;
        $this->amount = $amount;
        $this->timestamp = $timestamp;
        $this->isVerified = $isVerified;
        $this->isCheckIn = $isCheckIn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.transaction-card');
    }
}
