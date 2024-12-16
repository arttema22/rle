<?php

namespace App\Livewire\Btrip;

use App\Models\BusinessTrip;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy]
class BtripSmallManager extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $btrip_id, $event_date, $owner, $driver_id, $sum, $comment;
    public $isOpenForm = false, $confirmingDeletion = false;
    public $createOrUpdate;

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $btrips = BusinessTrip::where('driver_id', Auth::user()->id)
            ->where('profit_id', 0)
            ->with('driver')
            ->with('log')
            ->orderByDesc('event_date')
            ->paginate(3, pageName: 'btrips');

        return view('livewire.btrip.btrip-small-manager', [
            'btrips' => $btrips]);
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

        $btrip = BusinessTrip::findOrFail($id);

        $this->btrip_id = $btrip->id;
        $this->event_date = $btrip->event_date->format('Y-m-d');
        $this->sum = $btrip->sum;
        $this->comment = $btrip->comment;
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
            'sum' => 'required|decimal:0,2|min:10|max:9999999.99',
            'comment' => 'nullable|string',
        ]);

        BusinessTrip::updateOrCreate(
            ['id' => $this->btrip_id],
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
        $this->dispatch('btripUpdate');
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
        BusinessTrip::find($this->btrip_id)->delete();
        $this->confirmingDeletion = false;
        $this->dispatch('btripUpdate');
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
        $this->sum = '';
        $this->comment = '';
    }
}
