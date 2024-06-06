@props(['type'])

@php 

    $classes = [
        'string' => 'bg-[#212B36]',
        'integer' => 'bg-[#13C296]',
        'boolean' => 'bg-primary',
    ];

    $roleClasses = $classes[$type] ?? 'bg-primary';

@endphp

<button class="inline-flex rounded-full {{ $roleClasses }} px-3 py-1 text-sm font-medium text-white hover:bg-opacity-90">
    {{ $type }}
</button>
