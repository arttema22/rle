<h3 class="flex gap-x-1.5 font-semibold text-gray-800">
    {{__('ui.updated')}}
</h3>
<div class="flex flex-wrap justify-start items-center gap-1">
    <span class="bg-red-50 px-1 rounded-md">
        {{__('ui.old')}}:
        {{$old}}
    </span>
    <span class="bg-green-50 px-1 rounded-md">
        {{__('ui.new')}}:
        {{$new}}
    </span>
</div>
