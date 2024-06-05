@props(['roleName'])

@php 

    $classes = [
        'Root' => 'bg-[#212B36]',
        'Inspector' => 'bg-[#13C296]',
        'Real State Agent' => 'bg-primary',
    ];

    $roleClasses = $classes[$roleName] ?? 'bg-primary';

@endphp

<button class="inline-flex rounded-full {{ $roleClasses }} px-3 py-1 text-sm font-medium text-white hover:bg-opacity-90">
    {{ $roleName }}
</button>
