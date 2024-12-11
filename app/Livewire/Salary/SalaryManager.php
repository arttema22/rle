<?php

namespace App\Livewire\Salary;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\WithoutUrlPagination;

#[Lazy]
class SalaryManager extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $salary_id, $event_date, $owner_id, $driver_id, $sum, $comment;
    public $editForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    public function render()
    {
        sleep(3);
        return view('livewire.salary.salary-manager');
    }

    public function placeholder()
    {
        return view('livewire.salary.spinner');
    }
}
