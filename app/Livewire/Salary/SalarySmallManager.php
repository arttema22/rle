<?php

namespace App\Livewire\Salary;

use App\Models\Salary;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SalarySmallManager extends Component
{
    public $salary_id, $event_date, $owner, $driver_id, $sum, $comment;
    public $isOpenForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    public function render()
    {
        // sleep(5);
        $salaries = Salary::with(['owner'])->with(['driver'])->simplePaginate(3, pageName: 'salaries');
        return view('livewire.salary.salary-small-manager', ['salaries' => $salaries]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->event_date = date('Y-m-d');
        $this->createOrUpdate = 0;
        $this->toggle();
    }

    public function store()
    {
        $this->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);

        dd(Auth::user());
        Salary::updateOrCreate(
            ['id' => $this->salary_id],
            [
                'event_date' => $this->event_date,
                'owner' => Auth::user()->name,
                'driver_id' => Auth::user()->id,
                'sum' => $this->sum,
                'comment' => $this->comment,
            ]
        );
        $this->toggle();
        $this->resetInputFields();
        $this->dispatch('salaryUpdate');
    }

    public function toggle()
    {
        $this->isOpenForm = !$this->isOpenForm;
    }

    private function resetInputFields()
    {
        $this->salary_id = null;
        $this->event_date = '';
        $this->owner = '';
        $this->driver_id = '';
        $this->sum = '';
        $this->comment = '';
    }
}
