<x-accordion.wrap wire:key="{{ $salary->id }}">
    <x-accordion.button>
        <div class="w-1/4">{{$salary->event_date->format(config('app.date_format'))}}</div>
        <div class="w-1/4">{{$salary->sum}}</div>
        <div class="w-1/4">{{$salary->comment}}</div>
        <div class="w-1/4 flex justify-end gap-2">
            <x-buttons.edit wire:click="edit({{ $salary->id }})" />
            <x-buttons.delete wire:click="confirmDelete({{ $salary->id }})" />
        </div>
    </x-accordion.button>
    @if ($salary->log->isNotEmpty())
    <x-accordion.content>
        <!-- Timeline -->
        <div>
            @foreach ( $salary->log as $log )
            @if ($log)
            <!-- Item -->
            <x-timeline.wrap>
                <!-- Left Content -->
                <x-slot:left>
                    {{$log->created_at->format(config('app.date_full_format'))}}
                </x-slot:left>
                <!-- End Left Content -->
                <!-- Right Content -->
                <x-slot:right>
                    @if ($log->event == 'created')
                    <x-timeline.item-create>
                        {{__('ui.owner')}}: {{$salary->owner}}
                    </x-timeline.item-create>
                    @endif
                    @if ($log->event == 'updated')
                    <x-timeline.item-update>
                        <x-slot:old>
                            {{date('d.m.Y', strtotime(json_decode($log)->properties->old->event_date))}}
                            {{json_decode($log)->properties->old->sum}}
                            {{json_decode($log)->properties->old->comment}}
                        </x-slot:old>
                        <x-slot:new>
                            {{date('d.m.Y', strtotime(json_decode($log)->properties->attributes->event_date))}}
                            {{json_decode($log)->properties->attributes->sum}}
                            {{json_decode($log)->properties->attributes->comment}}
                        </x-slot:new>
                    </x-timeline.item-update>
                    @endif
                </x-slot:right>
                <!-- End Right Content -->
            </x-timeline.wrap>
            <!-- End Item -->
            @endif
            @endforeach
        </div>
        <!-- End Timeline -->
    </x-accordion.content>
    @endif
</x-accordion.wrap>
