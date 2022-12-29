<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PackageTicketCard extends Component
{
    public $isExpanded = false;
    public $amounts = 0;
    public $price;
    public $name;
    public $category_id;

    public function expanded() {
        $this->isExpanded = !$this->isExpanded;
    }

    public function increment() {
        $this->amounts++;
    }

    public function decrement() {
        $this->amounts--;
    }

    public function setCategoryPrice() {
        
    }

    public function render()
    {
        return view('livewire.package-ticket-card');
    }
}
