<?php

namespace App\Livewire\Refilling;

use Livewire\Component;
use App\Models\Refilling;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy]
class RefillingSmallManager extends Component
{
 use WithPagination, WithoutUrlPagination;

     public $refilling_id, $event_date, $owner, $driver_id, $volume, $price, $sum, $comment;

        // 'dir_petrol_station_brand_id',
        // 'dir_petrol_station_id',
        // 'dir_fuel_category_id',
        // 'dir_fuel_type_id',
        // 'truck_id',
        // 'integration_id',

    public $isOpenForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
            $refillings = Refilling::where('driver_id', Auth::user()->id)
            ->where('profit_id', 0)
            ->with('driver')
            ->with('log')
            ->orderByDesc('event_date')
            ->paginate(3, pageName: 'refillings');

        return view('livewire.refilling.refilling-small-manager',
            ['refillings' => $refillings]);
    }

       /**
     * placeholder
     *
     * @return void
     */
    public function placeholder()
    {
        return view('livewire.salary.spinner');
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $this->resetInputFields();
        $this->event_date = date('Y-m-d');
        $this->createOrUpdate = 0;
        $this->toggle();
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $this->createOrUpdate = 1;

        $refilling = Refilling::findOrFail($id);

        $this->refilling_id = $refilling->id;
        $this->event_date = $refilling->event_date->format('Y-m-d');
        $this->value = $refilling->value;
        $this->price = $refilling->price;
        $this->sum = $refilling->sum;
        $this->comment = $refilling->comment;
        $this->toggle();
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $this->validate([
            'event_date' => 'required|date|before_or_equal:today',
            'volume' => 'required|decimal:0,2|min:10|max:9999999.99',
            'price' => 'required|decimal:0,2|min:10|max:9999999.99',
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);

        Refilling::updateOrCreate(
            ['id' => $this->refilling_id],
            [
                'event_date' => $this->event_date,
                'owner' => Auth::user()->last_name,
                'driver_id' => Auth::user()->id,
                'volume' => $this->volume,
                'price' => $this->price,
                'sum' => $this->sum,
                'comment' => $this->comment,
            ]
        );
        $this->toggle();
        $this->resetInputFields();
        $this->dispatch('refillingUpdate');
    }

    /**
     * confirmDelete
     *
     * @param  mixed $id
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->btrip_id = $id;
        $this->confirmingDeletion = true;
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        Refilling::find($this->btrip_id)->delete();
        $this->confirmingDeletion = false;
        $this->dispatch('refillingUpdate');
    }

    /**
     * toggle
     *
     * @return void
     */
    public function toggle()
    {
        $this->isOpenForm = !$this->isOpenForm;
    }

    /**
     * resetInputFields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->btrip_id = null;
        $this->event_date = '';
        $this->owner = '';
        $this->driver_id = '';
        $this->volume = '';
        $this->price = '';
        $this->sum = '';
        $this->comment = '';
    }
}
