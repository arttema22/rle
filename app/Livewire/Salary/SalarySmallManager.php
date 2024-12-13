<?php

namespace App\Livewire\Salary;

use App\Models\Salary;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy]
class SalarySmallManager extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $salary_id, $event_date, $owner, $driver_id, $sum, $comment;
    public $isOpenForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    public function render()
    {
        //  sleep(3);
        $salaries = Salary::where('driver_id', Auth::user()->id)
            ->with('driver')->orderByDesc('event_date')->simplePaginate(3, pageName: 'salaries');
        return view('livewire.salary.salary-small-manager', ['salaries' => $salaries]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->event_date = date('Y-m-d');
        $this->createOrUpdate = 0;
        $this->toggle();
    }

    public function edit($id)
    {
        $this->createOrUpdate = 1;

        $salary = Salary::findOrFail($id);

        $this->salary_id = $salary->id;
        $this->event_date = $salary->event_date->format('Y-m-d');
        $this->sum = $salary->sum;
        $this->comment = $salary->comment;
        $this->toggle();
    }

    public function store()
    {
        $this->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);

        Salary::updateOrCreate(
            ['id' => $this->salary_id],
            [
                'event_date' => $this->event_date,
                'owner' => Auth::user()->last_name,
                'driver_id' => Auth::user()->id,
                'sum' => $this->sum,
                'comment' => $this->comment,
            ]
        );
        $this->toggle();
        $this->resetInputFields();
        $this->dispatch('salaryUpdate');
    }

    public function confirmDelete($id)
    {
        $this->salary_id = $id;
        $this->confirmingDeletion = true;
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        Salary::find($this->salary_id)->delete();
        $this->confirmingDeletion = false;
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
