<div>
    <x-header.header>
        {{__('Salaries')}}
    </x-header.header>

    {{-- @livewire('Salary.SalarySmallManager') --}}

    <div class="relative mx-auto  bg-gray-100 overflow-hidden border sm:rounded-lg p-4">
        <div class="w-full flex px-6 py-1">
            <div class="w-1/3">{{__('Date')}}</div>
            <div class="w-1/3">{{__('Sum')}}</div>
            <div class="w-1/3">{{__('Comment')}}</div>
        </div>
        <div class="space-y-2">
            @foreach ( $salaries as $salary )
            <div x-data="{ open: false }" wire:key="{{ $salary->id }}"
                class="bg-white shadow-[0_2px_4px_0px_rgba(0,0,0,0.15)] px-6 py-3 rounded-md" role="accordion">
                <button @click="open=!open" type="button"
                    class="w-full text-base text-left text-gray-800 flex items-center transition-all">
                    <div class="w-1/3">{{$salary->event_date->format(config('app.date_format'))}}</div>
                    <div class="w-1/3">{{$salary->sum}}</div>
                    <div class="w-1/3">{{$salary->comment}}</div>
                </button>
                <div x-show="open" class="flex justify-between items-center rounded-md">
                    <div class="mr-2 text-xs text-gray-600 leading-relaxed">
                        {{__('Created')}} {{$salary->created_at}}
                        {{-- {{__('Updated')}} {{$salary->updated_at}} --}}
                        {{__('Owner')}} {{$salary->owner}}
                        {{-- {{__('Driver')}} {{$salary->driver->last_name}} --}}
                        @foreach ( $salary->log->where('log_name', 'salary') as $log )
                        <div>{{$log->description}}</div>
                        <div>{{$log->event}}</div>
                        @php
                        $data = json_decode($log->properties);
                        @endphp
                        <div>{{$data->old->event_date}}</div>
                        <div>{{$data->old->sum}}</div>
                        <div>{{$data->old->comment}}</div>

                        <div>{{$data->attributes->event_date}}</div>
                        <div>{{$data->attributes->sum}}</div>
                        <div>{{$data->attributes->comment}}</div>

                        <div>{{$log->properties}}</div>

                        <div>{{$log->subject_id}}</div>
                        <div>{{$log->changes}}</div>
                        {{$log}}
                        @endforeach
                    </div>
                    <div class="flex">
                        <button wire:click="edit({{ $salary->id }})">edit</button>
                        <button wire:click="confirmDelete({{ $salary->id }})">delete</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>