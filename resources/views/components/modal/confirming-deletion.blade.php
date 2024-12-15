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
                            {{__('ui.delete')}}
                        </h3>
                        <div class="mt-2">
                            <div class="mt-4">
                                {{__('ui.want_to_delete')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <x-buttons.btn-primary wire:click="delete" wire:loading.attr="disabled">{{__('ui.delete')}}
                    </x-buttons.btn-primary>
                    <x-buttons.btn-cancel wire:click="$toggle('confirmingDeletion')" />
                </div>
            </div>
        </div>
    </div>
</div>
@endif
