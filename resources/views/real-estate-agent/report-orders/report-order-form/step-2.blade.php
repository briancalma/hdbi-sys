@extends('layouts.app')

@section('title', 'Order New Report')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Step 2: Order Details
        </h3>
    </div>

    <form method="POST" action="{{ route('real-estate-agent.report-orders.store.step-2') }}" x-data="{ checkboxToggle: false, preferredContact: '' }">
        @csrf()
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
                        spellcheck="false"
                        >{{ old('order_notes') }}</textarea>
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

                        @foreach($packages as $item)
                            <option value="{{ $item->id }}" class="text-body">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label for="checkboxLabelOne" class="flex cursor-pointer select-none items-center text-sm font-medium">
                    <div class="relative">
                        <input name="order_have_second_dwelling" type="checkbox" id="checkboxLabelOne" class="sr-only" @change="checkboxToggle = !checkboxToggle">
                        <div :class="checkboxToggle &amp;&amp; 'border-primary bg-gray dark:bg-transparent'" class="mr-4 flex h-5 w-5 items-center justify-center rounded border">
                            <span :class="checkboxToggle &amp;&amp; '!opacity-100'" class="opacity-0">
                              <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                              </svg>
                            </span>
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
                        name="order_dwelling_notes"
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
                    <select name="order_handling_time" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Handling Time
                        </option>
                        @foreach($handlingTimes as $handlingTime)
                            <option value="{{ $handlingTime->id }}" class="text-body">{{ $handlingTime->name }} - Additional Charge (AUD {{ $handlingTime->additional_charge }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Preferred Contact Information
                    </label>
                    <select name="order_preferred_contact" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" 
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
                            name="order_contact_name"
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
                            name="order_contact_email"
                            value="{{ old('order_contact_email') }}"
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
                            name="order_mobile_number"
                            value="{{ old('order_mobile_number') }}"
                        />
                    </div>

                </div>
            </div>
        </div>
        
        <div class="p-6.5 flex flex-col gap-1 border-t border-stroke">
            <button         
                class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                Proceed to Step 3
            </button>
        </div>
    </form>
</div>
@endsection