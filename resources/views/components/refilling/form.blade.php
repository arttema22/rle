{{-- @if($isOpenForm) --}}
<x-forms.update.wrap>
    <x-slot:title>
        {{($createOrUpdate) ? __('refillings.edit_refilling') : __('refillings.new_refilling')}}
    </x-slot:title>

    <x-slot:content>
        <div class="mt-4">
            <label class="text-gray-800 text-sm mb-2 block">{{__('ui.date')}}</label>
            <input wire:model="event_date" name="event_date" type="date" required autofocus autocomplete="event_date"
                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                placeholder="{{__('ui.enter_date')}}" />
            <div class="text-red-600">@error('event_date') {{ $message }} @enderror</div>
        </div>
        <div class="mt-4">
            <label class="text-gray-800 text-sm mb-2 block">{{__('ui.volume')}}</label>
            <input wire:model="volume" name="volume" type="number" min="10" max="1000000" step=".01" required
                autocomplete="volume"
                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                placeholder="{{__('ui.enter_volume')}}" />
            <div class="text-red-600">@error('volume') {{ $message }} @enderror</div>
        </div>
        <div class="mt-4">
            <label class="text-gray-800 text-sm mb-2 block">{{__('ui.price')}}</label>
            <input wire:model="price" name="price" type="number" min="10" max="1000000" step=".01" required
                autocomplete="price"
                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                placeholder="{{__('ui.enter_price')}}" />
            <div class="text-red-600">@error('price') {{ $message }} @enderror</div>
        </div>
        <div class="mt-4">
            <label class="text-gray-800 text-sm mb-2 block">{{__('ui.sum')}}</label>
            <input wire:model="sum" name="sum" type="number" min="10" max="1000000" step=".01" required
                autocomplete="sum"
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
        @livewire('Form.SelectTruck')
    </x-slot:content>

    <x-slot:bottom>
        <x-buttons.btn-primary wire:click="store">{{__('ui.save')}}</x-buttons.btn-primary>
        <x-buttons.btn-cancel wire:click="$toggle('isOpenForm')" />
    </x-slot:bottom>

</x-forms.update.wrap>
{{-- @endif --}}