<div>
    <x-header.header>
        {{__('Dashboard')}}
    </x-header.header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="md:col-span-2">
            @livewire('Refilling.RefillingSmallManager')
        </div>


        <div class="md:col-span-2">
            @livewire('Salary.SalarySmallManager')
        </div>
        <div>
            @livewire('Salary.SalaryCard')
        </div>

        <div class="md:col-span-2">
            @livewire('Btrip.BtripSmallManager')
        </div>
        <div>
            @livewire('Btrip.BtripCard')
        </div>

    </div>
</div>