<?php

namespace App\Livewire\Btrip;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\BusinessTrip;
use Illuminate\Support\Facades\Auth;

class BtripCard extends Component
{
    #[On('btripUpdate')]

    public function render()
    {
        $Btrips = BusinessTrip::where('driver_id', Auth::user()->id)
            ->where('profit_id', 0)
            ->get();
        $BtripCount = $Btrips->count();
        $BtripSum = round($Btrips->sum('sum'), 2);

        return view('livewire.btrip.btrip-card', [
            'BtripCount' => $BtripCount,
            'BtripSum' => $BtripSum,
        ]);
    }
}
