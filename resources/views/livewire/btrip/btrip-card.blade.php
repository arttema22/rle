<div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center w-auto">
    <h2 class="text-gray-500 font-medium uppercase">
        <a href="{{route('btrips')}}">{{__('btrips.btrips')}}</a>
    </h2>
    <div class="text-2xl font-bold">
        {{$BtripCount}} / {{$BtripSum}}<br>
    </div>
    <div class="text-gray-400 text-xs">
        {{__('ui.count')}} / {{__('ui.sum')}}
    </div>
</div>