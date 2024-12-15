<div {{ $attributes->merge(['x-data' => '{ open: false }',
'role' => 'accordion',
 'class' => 'bg-white shadow-[0_2px_4px_0px_rgba(0,0,0,0.15)] px-6 py-3 rounded-md']) }}>
    {{$slot}}
</div>
