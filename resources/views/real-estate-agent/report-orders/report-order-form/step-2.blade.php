@extends('layouts.app')

@section('title', 'Order New Report')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Step 2: Order Details
        </h3>
    </div>

    <form method="POST" action="{{ route('root.configurations.store') }}" x-data="{ checkboxToggle: false, preferredContact: '' }">
        <div class="p-6.5 flex flex-col gap-1">
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Order Notes
                    </label>
                    
                    <textarea 
                        name="order_notes"
                        rows="6" 
                        placeholder="Enter order notes here" 
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" 
                        spellcheck="false"></textarea>
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Total numbers of rooms
                    </label>
                    
                    <input
                        type="number"
                        placeholder="Enter total numbers of rooms"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        name="order_total_rooms"
                        value="{{ old('order_total_rooms') }}"
                    />
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Order Type
                    </label>
                    <select name="order_type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Order Type
                        </option>
                        <option value="Root" class="text-body" {{ old('role') === 'Root' ? 'selected' : '' }}>Package 1</option>
                        <option value="Inspector" class="text-body" {{ old('role') === 'Inspector' ? 'selected' : '' }}>Package 2</option>
                        <option value="Real Estate Agent" class="text-body" {{ old('role') === 'Real Estate Agent' ? 'selected' : '' }}>Package 3</option>
                    </select>
                </div>
            </div>

            <div class="my-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label for="checkboxLabelOne" class="flex cursor-pointer select-none items-center text-sm font-medium">
                    <div class="relative">
                        <input type="checkbox" id="checkboxLabelOne" class="sr-only" @change="checkboxToggle = !checkboxToggle">
                        <div :class="checkboxToggle &amp;&amp; 'border-primary bg-gray dark:bg-transparent'" class="mr-4 flex h-5 w-5 items-center justify-center rounded border">
                        <span :class="checkboxToggle &amp;&amp; 'bg-primary'" class="h-2.5 w-2.5 rounded-sm"></span>
                        </div>
                    </div>
                    Add a second dwelling on the property
                    </label>
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-6 xl:flex-row" x-show="checkboxToggle">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Second Dwelling Notes
                    </label>
                    
                    <textarea 
                        name="order_notes"
                        rows="6" 
                        placeholder="Enter additional second dwelling notes here" 
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" 
                        spellcheck="false"></textarea>
                </div>
            </div>

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Handling Time
                    </label>
                    <select name="order_type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Handling Time
                        </option>
                        <option value="3-4 Business Days" class="text-body">3-4 Business Days (Default)</option>
                        <option value="2-3 Business Days" class="text-body">2-3 Business Days (Additional Charge: $X)</option>
                        <option value="1-2 Business Days" class="text-body">1-2 Business Days (Additional Charge: $Y)</option>
                    </select>
                </div>
            </div>

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Preferred Contact Information
                    </label>
                    <select name="order_type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" 
                        x-model="preferredContact">
                        <option value="" class="text-body">
                            Select Preferred Contact Information
                        </option>
                        <option value="Self" class="text-body">Self (Use my account information)</option>
                        <option value="Vendors" class="text-body">Vendors</option>
                        <option value="Office Manager" class="text-body">Office Manager</option>
                    </select>
                    </select>
                </div>
            </div>
            
            <div x-show="preferredContact == 'Vendors' || preferredContact == 'Office Manager'">
                <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Contact Name
                        </label>
                        
                        <input
                            type="text"
                            placeholder="Enter Contact Name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="order_total_rooms"
                            value="{{ old('order_total_rooms') }}"
                        />
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email Address
                        </label>
                        
                        <input
                            type="email"
                            placeholder="Enter Contact Email Address"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="order_total_rooms"
                            value="{{ old('order_total_rooms') }}"
                        />
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Mobile Number
                        </label>
                        
                        <input
                            type="text"
                            placeholder="Enter Contact Mobile Number"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="order_total_rooms"
                            value="{{ old('order_total_rooms') }}"
                        />
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection