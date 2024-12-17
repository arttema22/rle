<?php

namespace App\Livewire\Form;

use Livewire\Component;
use App\Models\Sys\Truck;

class SelectTruck extends Component
{
    public $items; // Для хранения данных из таблицы
    public $selectedItem; // Для хранения выбранного значения

    public function mount()
    {
        $this->items = Truck::all();
    }

    public function render()
    {
        return view('livewire.form.select-truck');
    }
}
