<?php

namespace App\Livewire\Salary;

use App\Models\Salary;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class SalaryCard extends Component
{
    #[On('salaryUpdate')]

    public function render()
    {
        $Salaries = Salary::where('driver_id', Auth::user()->id)
            ->whereNull('profit_id')
            ->get();
        $SalariesCount = $Salaries->count();
        $SalariesSum = round($Salaries->sum('sum'), 2);

        return view('livewire.salary.salary-card', [
            'SalariesCount' => $SalariesCount,
            'SalariesSum' => $SalariesSum,
        ]);
    }
}
