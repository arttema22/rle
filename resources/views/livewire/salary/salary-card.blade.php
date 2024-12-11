<div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center w-auto">
    <h2 class="text-gray-500 font-medium uppercase">
        <a href="{{route('salaries')}}">{{__('Salaries')}}</a>
    </h2>
    <div class="text-2xl font-bold">
        {{$SalariesCount}} / {{$SalariesSum}}<br>
    </div>
    <div class="text-gray-400 text-xs">
        {{__('Count')}} / {{__('Sum')}}
    </div>
</div>