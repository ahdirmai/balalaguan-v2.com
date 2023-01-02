<?php

namespace App\Http\Livewire;

use App\Models\Chance;
use App\Models\Phase;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PackageTicketCard extends Component
{
    public $periods;
    public $phases;
    public $phaseid;
    public $categories;
    public $category_id;
    public $isExpanded = false;
    public $amounts = 0;
    public $price;
    public $name;
    public $chance;
    public $finalChance;

    public function mount()
    {
        $this->amounts = 1;
        // $this->phaseid = 0;
        $this->category_id = 0;
    }

    public function expanded($phaseid)
    {
        $this->phaseid = $phaseid;
        $this->isExpanded = !$this->isExpanded;
    }

    public function increment()
    {
        $this->amounts++;
    }

    public function decrement()
    {
        $this->amounts--;
    }

    public function setCategoryPrice()
    {
    }

    public function order($amount, $period_id)
    {
        return redirect()->route('user.transaction.create', [$period_id, $amount]);
    }

    public function render()
    {
        if (auth()->user() != null) {
            $chance = Chance::where('user_id', auth()->user()->id)->first();
            $this->chance = $chance->chance;
            $this->finalChance = $this->chance - $this->amounts;
        }
        $period = $this->periods
            ->where('category_id', $this->category_id)
            ->where('phase_id', $this->phaseid)->first();


        $getPeriod = [
            $getFestivalStatus = $this->periods
                ->where('phase_id', $this->phaseid)->first(),
            $getVIPStatus = $this->periods
                ->where('phase_id', $this->phaseid)->last(),
        ];
        // dd($getPeriod);
        // dd($getFestivalStatus->is_active, $getVIPStatus->is_active);
        $data = [
            'period' => $period,
            'getPeriod' => $getPeriod,
        ];
        return view('livewire.package-ticket-card', $data);
    }
}
