@extends('layouts.app')

@section('title', 'Create New Config')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            New Config Form
        </h3>
    </div>

    <form method="POST" action="{{ route('root.configurations.store') }}" x-data="{ type: 'string' }">
        @csrf
        <div class="p-6.5">
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Config Name
                    </label>
                    
                    <input
                        type="text"
                        placeholder="Enter config name"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        name="key"
                        value="{{ old('key') }}"
                    />
                </div>
            </div>

            <div class="mb-5.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Type
                    </label>
                    <select name="type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Type
                        </option>
                        <option value="integer" class="text-body" {{ old('type') === 'integer' ? 'selected' : '' }}>integer</option>
                        <option value="string" class="text-body" {{ old('type') === 'string' ? 'selected' : '' }}>string</option>
                        <option value="boolean" class="text-body" {{ old('type') === 'boolean' ? 'selected' : '' }}>boolean</option>
                    </select> 
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Config Value
                    </label>
                    <input
                        type="text"
                        placeholder="Enter config value"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        name="value"
                        value="{{ old('value') }}"
                    />
                    <p class="text-sm text-gray-600"></p>
                </div>
            </div>
            <div class="flex flex-row-reverse gap-2">
                <a href="{{ route('root.configurations.index') }}" class="flex justify-center rounded bg-gray p-3 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70">
                    Cancel
                </a>    
                <button class="flex justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                    Save New Config
                </button>
            </div>
        </div>
    </form>
</div>
@endsection