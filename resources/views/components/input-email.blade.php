@props(['name' => '', 'label' => ''])

<div>
    <label class="mb-3 block text-md font-medium text-black dark:text-white">{{ $label }}</label>
    <input
        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary @error('key') border-red-500 @enderror"
        name="{{ $name }}"
        type="email"
        {{ $attributes }}
    />
    <div class="text-danger text-sm">@error($name) {{ $message }} @enderror</div>
</div>