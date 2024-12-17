<div class="mt-4">
    <label class="text-gray-800 text-sm mb-2 block">{{__('ui.truck')}}</label>
    <select wire:model="selectedItem"
        class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600">
        <option value="">{{__('ui.select_element')}}</option>
        @foreach($items as $item)
        <option value="{{ $item->id }}">{{$item->reg_num_ru}} {{$item->type->name}}
            {{$item->brand->name}} {{$item->name}}</option>
        @endforeach
    </select>
    <div class="text-red-600">@error('volume') {{ $message }} @enderror</div>
</div>