<div>
    <x-header.header>
        <h1>{{__('salaries.salaries')}}</h1>
        <button wire:click="create">{{__('ui.create')}}</button>
    </x-header.header>

    <div class="relative mx-auto  bg-gray-100 overflow-x-auto border sm:rounded-lg p-4">
        <div class="w-full flex px-6 py-1">
            <div class="w-1/4">{{__('ui.date')}}</div>
            <div class="w-1/4">{{__('ui.sum')}}</div>
            <div class="w-1/4">{{__('ui.comment')}}</div>
            <div class="w-1/4"></div>
        </div>
        <div class="space-y-2">
            @foreach ( $salaries as $salary )
            <div x-data="{ open: false }" wire:key="{{ $salary->id }}"
                class="bg-white shadow-[0_2px_4px_0px_rgba(0,0,0,0.15)] px-6 py-3 rounded-md" role="accordion">
                <div @click="open=!open" type="button"
                    class="w-full text-base text-gray-800 flex justify-between items-center transition-all">
                    <div class="w-1/4">{{$salary->event_date->format(config('app.date_format'))}}</div>
                    <div class="w-1/4">{{$salary->sum}}</div>
                    <div class="w-1/4">{{$salary->comment}}</div>
                    <div class="w-1/4 flex justify-end gap-2">
                        <button wire:click="edit({{ $salary->id }})" title="{{__('ui.edit')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                viewBox="0 0 348.882 348.882">
                                <path
                                    d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                    data-original="#000000" />
                                <path
                                    d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                    data-original="#000000" />
                            </svg>
                        </button>
                        <button wire:click="confirmDelete({{ $salary->id }})" title={{__('ui.delete')}}>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                    data-original="#000000" />
                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                    data-original="#000000" />
                            </svg>
                        </button>
                    </div>
                </div>
                @if ($salary->log->isNotEmpty())
                <div x-show="open" class="flex justify-between items-center border-t">
                    <div class="mr-2 text-xs text-gray-600 leading-relaxed">
                        <!-- Timeline -->
                        <div>
                            @foreach ( $salary->log as $log )
                            @if ($log)
                            <!-- Item -->
                            <div class="flex gap-x-3">
                                <!-- Left Content -->
                                <div class="w-16 text-end">
                                    <span class="text-xs text-gray-500">
                                        {{$log->created_at->format(config('app.date_full_format'))}}
                                    </span>
                                </div>
                                <!-- End Left Content -->
                                <!-- Icon -->
                                <div
                                    class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                                    <div class="relative z-10 size-7 flex justify-center items-center">
                                        <div class="size-2 rounded-full bg-gray-400"></div>
                                    </div>
                                </div>
                                <!-- End Icon -->
                                <!-- Right Content -->
                                <div class="grow pt-0.5 pb-2">
                                    @if ($log->event == 'created')
                                    <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
                                        {{__('ui.created')}}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{__('ui.owner')}}: {{$salary->owner}}
                                    </p>
                                    @endif
                                    @if ($log->event == 'updated')
                                    <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
                                        {{__('ui.updated')}}
                                    </h3>
                                    <div class="flex gap-1">
                                        <div class="text-red-800 p-1 border border-red-800 rounded-md">
                                            {{__('ui.old')}}:
                                            <span class="bg-red-100 p-1 m-1 rounded-md">
                                                {{date('d.m.Y', strtotime(json_decode($log)->properties->old->event_date))}}
                                            </span>
                                            <span class="bg-red-100 p-1 m-1 rounded-md">
                                                {{json_decode($log)->properties->old->sum}}
                                            </span>
                                            <span class="bg-red-100 p-1 m-1 rounded-md">
                                                {{json_decode($log)->properties->old->comment}}
                                            </span>
                                        </div>
                                        <div class="text-green-800 p-1 border border-green-800 rounded-md">
                                            {{__('ui.new')}}:
                                            <span class="bg-green-100 p-1 m-1 rounded-md">
                                                {{date('d.m.Y', strtotime(json_decode($log)->properties->attributes->event_date))}}
                                            </span>
                                            <span class="bg-green-100 p-1 m-1 rounded-md">
                                                {{json_decode($log)->properties->attributes->sum}}
                                            </span>
                                            <span class="bg-green-100 p-1 m-1 rounded-md">
                                                {{json_decode($log)->properties->attributes->comment}}
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- End Right Content -->
                            </div>
                            <!-- End Item -->
                            @endif
                            @endforeach
                        </div>
                        <!-- End Timeline -->
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
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
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">{{__('Save')}}</button>
                        <button wire:click="toggle" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">{{__('Cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($confirmingDeletion)
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
                                {{__('Delete')}}
                            </h3>
                            <div class="mt-2">
                                <div class="mt-4">
                                    {{__('Are you sure you want to delete this entry?')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button wire:click="delete" wire:loading.attr="disabled" type="button"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">{{__('Save')}}</button>
                        <button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">{{__('Cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
