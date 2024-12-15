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
                            {{($createOrUpdate) ? __('salaries.edit_salary') : __('salaries.new_salary')}}
                        </h3>
                        <div class="mt-2">
                            <div class="mt-4">
                                <label class="text-gray-800 text-sm mb-2 block">{{__('ui.date')}}</label>
                                <input wire:model="event_date" name="event_date" type="date" required autofocus
                                    autocomplete="event_date"
                                    class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="{{__('ui.enter_date')}}" />
                                <div class="text-red-600">@error('event_date') {{ $message }} @enderror</div>
                            </div>
                            <div class="mt-4">
                                <label class="text-gray-800 text-sm mb-2 block">{{__('ui.sum')}}</label>
                                <input wire:model="sum" name="sum" type="number" min="10" max="1000000" step=".01"
                                    required autocomplete="sum"
                                    class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="{{__('ui.enter_sum')}}" />
                                <div class="text-red-600">@error('sum') {{ $message }} @enderror</div>
                            </div>
                            <div class="mt-4">
                                <label class="text-gray-800 text-sm mb-2 block">{{__('ui.comment')}}</label>
                                <input wire:model="comment" name="comment" type="text" autocomplete="comment"
                                    class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="{{__('ui.enter_comment')}}" />
                                <div class="text-red-600">@error('comment') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <x-buttons.btn-primary wire:click="store">{{__('ui.save')}}</x-buttons.btn-primary>
                    <x-buttons.btn-cancel wire:click="$toggle('isOpenForm')" />
                </div>
            </div>
        </div>
    </div>
</div>
@endif
