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
                        {{__('Driver')}} {{$salary->driver->last_name}}
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

    <div wire:loading class="flex justify-center items-center absolute bottom-1 left-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-8 w-10 h-10 shrink-0 animate-spin"
            viewBox="0 0 122.88 122.88">
            <path
                d="M61.44,21.74c10.96,0,20.89,4.44,28.07,11.63c7.18,7.18,11.63,17.11,11.63,28.07c0,10.96-4.44,20.89-11.63,28.07 c-7.18,7.18-17.11,11.63-28.07,11.63c-10.96,0-20.89-4.44-28.07-11.63c-7.18-7.18-11.63-17.11-11.63-28.07 c0-10.96,4.44-20.89,11.63-28.07C40.55,26.19,50.48,21.74,61.44,21.74L61.44,21.74z M61.44,0c16.97,0,32.33,6.88,43.44,18 c11.12,11.12,18,26.48,18,43.44c0,16.97-6.88,32.33-18,43.44c-11.12,11.12-26.48,18-43.44,18c-16.97,0-32.33-6.88-43.44-18 C6.88,93.77,0,78.41,0,61.44C0,44.47,6.88,29.11,18,18C29.11,6.88,44.47,0,61.44,0L61.44,0z M93.47,29.41 c-8.2-8.2-19.52-13.27-32.03-13.27c-12.51,0-23.83,5.07-32.03,13.27c-8.2,8.2-13.27,19.52-13.27,32.03 c0,12.51,5.07,23.83,13.27,32.03c8.2,8.2,19.52,13.27,32.03,13.27c12.51,0,23.83-5.07,32.03-13.27c8.2-8.2,13.27-19.52,13.27-32.03 C106.74,48.93,101.67,37.61,93.47,29.41L93.47,29.41z M65.45,56.77c-1.02-1.02-2.43-1.65-4.01-1.65c-1.57,0-2.99,0.63-4.01,1.65 l-0.01,0.01c-1.02,1.02-1.65,2.43-1.65,4.01c0,1.57,0.63,2.99,1.65,4.01l0.01,0.01c1.02,1.02,2.43,1.65,4.01,1.65 c1.57,0,2.99-0.63,4.01-1.65l0.01-0.01c1.02-1.02,1.65-2.44,1.65-4.01C67.1,59.21,66.47,57.8,65.45,56.77L65.45,56.77L65.45,56.77z M65.06,50.79c1.47,0.54,2.8,1.39,3.89,2.48l0,0l0,0c0.37,0.37,0.72,0.77,1.03,1.2l0.1-0.03l21.02-5.63 c-1.63-3.83-3.98-7.28-6.88-10.17c-5.03-5.03-11.72-8.41-19.17-9.24v21.12C65.07,50.61,65.07,50.7,65.06,50.79L65.06,50.79z M72.04,61.63c-0.14,1.73-0.69,3.35-1.57,4.76c0.05,0.06,0.09,0.13,0.13,0.2l12.07,19.13c0.54-0.47,1.06-0.96,1.57-1.47 c5.83-5.83,9.44-13.9,9.44-22.8c0-1.87-0.16-3.7-0.47-5.49L72.04,61.63L72.04,61.63z M64.57,70.95c-0.99,0.31-2.04,0.47-3.13,0.47 c-0.98,0-1.93-0.13-2.84-0.38L46.82,90.19c4.39,2.24,9.36,3.5,14.62,3.5c5.46,0,10.6-1.36,15.11-3.75L64.57,70.95L64.57,70.95z M52.57,66.64c-0.92-1.38-1.52-2.99-1.7-4.71l-0.01,0l-21.09-6.6c-0.38,1.98-0.58,4.02-0.58,6.11c0,8.9,3.61,16.97,9.44,22.8 c0.63,0.63,1.29,1.24,1.98,1.82l11.8-19.19C52.47,66.8,52.52,66.72,52.57,66.64L52.57,66.64z M52.72,54.72 c0.36-0.51,0.76-1,1.21-1.44l0,0l0,0c1.05-1.04,2.31-1.87,3.71-2.41c-0.01-0.11-0.02-0.23-0.02-0.34v-21.1 c-7.38,0.87-14,4.23-18.98,9.22c-2.75,2.75-5.01,6-6.63,9.6L52.72,54.72L52.72,54.72z" />
        </svg>
    </div>

</div>