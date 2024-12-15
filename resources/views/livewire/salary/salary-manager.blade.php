<div>
    <x-header.header>
        <h1 class="uppercase">{{__('salaries.salaries')}}</h1>
        <x-buttons.btn-new wire:click="create" />
    </x-header.header>

    <div class="mb-4">
        <x-blocks.wrap>
            @if ($salaries->isNotEmpty())
            <x-blocks.header>
                <x-slot:title>
                    {{__('ui.active')}}
                </x-slot:title>
                <div class="w-1/4">{{__('ui.date')}}</div>
                <div class="w-1/4">{{__('ui.sum')}}</div>
                <div class="w-1/4">{{__('ui.comment')}}</div>
                <div class="w-1/4"></div>
            </x-blocks.header>
            <x-blocks.content>
                @each('components.items.salary', $salaries, 'salary')
                {{$salaries->links()}}
            </x-blocks.content>
            @else
            <x-blocks.no-entries />
            @endif
        </x-blocks.wrap>
    </div>
    <div>
        <x-blocks.wrap>
            @if ($archive->isNotEmpty())
            <x-blocks.header>
                <x-slot:title>
                    {{__('ui.archive')}}
                </x-slot:title>
                <div class="w-1/4">{{__('ui.date')}}</div>
                <div class="w-1/4">{{__('ui.sum')}}</div>
                <div class="w-1/4">{{__('ui.comment')}}</div>
                <div class="w-1/4"></div>
            </x-blocks.header>
            <x-blocks.content>
                @each('components.items.salary-archive', $archive, 'salary')
                {{$archive->links()}}
            </x-blocks.content>
            @else
            <x-blocks.no-entries />
            @endif
        </x-blocks.wrap>
    </div>

    @include('components.modal.salary-form')

    @include('components.modal.confirming-deletion')

</div>
