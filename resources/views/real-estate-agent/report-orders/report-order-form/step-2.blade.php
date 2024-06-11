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
                        required
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
                        required
                    />
                </div>

                <div class="w-full xl:w-1/2">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Order Type
                    </label>
                    <select name="order_type_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                        <option value="" class="text-body">
                            Select Order Type
                        </option>

                        @foreach($packages as $item)
                            <option value="{{ $item->id }}" class="text-body" {{ old('order_type_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- <div class="my-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    Add a second dwelling on the property
                </div>
            </div> -->
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Second Dwelling Notes <span class="text-danger">(Please fill this up if you want to add a second dwelling on the property)</span>
                    </label>
                    
                    <textarea 
                        name="order_dwelling_notes"
                        rows="6" 
                        placeholder="Enter additional second dwelling notes here" 
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" 
                        spellcheck="false"
                        >{{ old('order_dwelling_notes') }}</textarea>
                </div>
            </div>

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Handling Time
                    </label>
                    <select name="order_handling_time_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                    required>
                        <option value="" class="text-body">
                            Select Handling Time
                        </option>
                        @foreach($handlingTimes as $handlingTime)
                            <option value="{{ $handlingTime->id }}" class="text-body" {{ old('order_handling_time_id') == $handlingTime->id ? 'selected' : '' }}>{{ $handlingTime->name }} - Additional Charge (AUD {{ $handlingTime->additional_charge }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @php
                $preferredContacts = ['Self', 'Vendors', 'Office Manager'];
            @endphp

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Preferred Contact Information
                    </label>
                    <select name="order_preferred_contact" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" 
                        x-model="preferredContact"
                        required>
                        <option value="" class="text-body">
                            Select Preferred Contact Information
                        </option>
                        @foreach($preferredContacts as $contact)
                            <option value="{{ $contact }}" class="text-body" {{ old('order_preferred_contact') == $contact ? 'selected' : '' }}>{{ $contact }}</option>
                        @endforeach
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
                            value="{{ old('order_contact_name') }}"
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
                            name="order_contact_mobile_number"
                            value="{{ old('order_contact_mobile_number') }}"
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