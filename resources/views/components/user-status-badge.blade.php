@props(['status'])

@php 

    $classes = [
        'active' => 'bg-[#13C296]',
        'deactive' => 'bg-[#212B36]',
    ];

    $statusClasses = $classes[$status] ?? 'bg-primary';

@endphp

<button class="inline-flex rounded-full {{ $statusClasses }} px-3 py-1 text-sm font-medium text-white hover:bg-opacity-90">
    {{ $status }}
</button>
