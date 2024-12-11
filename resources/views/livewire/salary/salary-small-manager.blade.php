<div class="relative mx-auto  bg-gray-100 overflow-hidden border sm:rounded-lg">
    <div class="flex justify-between px-6 py-4 bg-white">
        {{__('Salaries')}}
        <button wire:click="create" title="{{__('New salary')}}">New</button>
    </div>
    <div class="overflow-x-auto p-4">
        <div class="w-full flex px-3 py-1">
            <div class="w-1/3">{{__('Date')}}</div>
            <div class="w-1/3">{{__('Sum')}}</div>
            <div class="w-1/3">{{__('Comment')}}</div>
        </div>
        <div class="h-[190px] overflow-y-auto space-y-2">
            @foreach ( $salaries as $salary )
            <div x-data="{ open: false }" wire:key="{{ $salary->id }}"
                class="bg-white shadow-[0_2px_4px_0px_rgba(0,0,0,0.15)] p-3 rounded-md" role="accordion">
                <button @click="open=!open" type="button"
                    class="w-full text-base text-left text-gray-800 flex items-center transition-all">
                    <div class="w-1/3">{{$salary->event_date->format(config('app.date_format'))}}</div>
                    <div class="w-1/3">{{$salary->sum}}</div>
                    <div class="w-1/3">{{$salary->comment}}</div>
                </button>
                <div x-show="open" class="flex justify-between items-center rounded-md">
                    <div class="mr-2 text-xs text-gray-600 leading-relaxed">
                        {{__('Created')}} {{$salary->created_at}}
                        {{__('Updated')}} {{$salary->updated_at}}
                        {{__('Owner')}} {{$salary->owner}}
                        {{__('Driver')}} {{$salary->driver->name}}
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
    <div class="px-4 py-4 bg-white">
        {{$salaries->links()}}
    </div>

    @if($isOpenForm)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true">
        </div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="text-center sm:text-left">
                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                {{($createOrUpdate) ? __('Edit salary') : __('Create new salary')}}
                            </h3>
                            <div class="mt-2">
                                <div class="mt-4">
                                    <label class="text-gray-800 text-sm mb-2 block">{{__('Date')}}</label>
                                    <input wire:model="event_date" name="event_date" type="date" required autofocus
                                        autocomplete="event_date"
                                        class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                        placeholder="{{__('Enter date')}}" />
                                    <div class="text-red-600">@error('event_date') {{ $message }} @enderror</div>
                                </div>
                                <div class="mt-4">
                                    <label class="text-gray-800 text-sm mb-2 block">{{__('Sum')}}</label>
                                    <input wire:model="sum" name="sum" type="number" min="10" max="1000000" step=".01"
                                        required autocomplete="sum"
                                        class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                        placeholder="{{__('Enter sum')}}" />
                                    <div class="text-red-600">@error('sum') {{ $message }} @enderror</div>
                                </div>
                                <div class="mt-4">
                                    <label class="text-gray-800 text-sm mb-2 block">{{__('Comment')}}</label>
                                    <input wire:model="comment" name="comment" type="text" autocomplete="comment"
                                        class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                        placeholder="{{__('Enter comment')}}" />
                                    <div class="text-red-600">@error('comment') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button wire:click="store" type="button"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                        <button wire:click="toggle" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">{{__('Cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>