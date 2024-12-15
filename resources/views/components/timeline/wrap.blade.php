<div class="flex gap-x-3">
    <div class="w-16 text-end">
        <span class="text-xs text-gray-500">
            {{$left}}
        </span>
    </div>
    <!-- Icon -->
    <div
        class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
        <div class="relative z-10 size-7 flex justify-center items-center">
            <div class="size-2 rounded-full bg-gray-400"></div>
        </div>
    </div>
    <!-- End Icon -->
    <div class="grow pt-0.5 pb-2">
        {{$right}}
    </div>
</div>
