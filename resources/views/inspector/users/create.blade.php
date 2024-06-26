@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
<div class="flex flex-col gap-9">
    <!-- Contact Form Two -->
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
                User Information
            </h3>
        </div>


        <form method="POST" action="{{ route('inspector.users.store') }}">
            @csrf
            <div class="p-6.5">
                <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            First name
                        </label>
                        
                        <input
                            type="text"
                            placeholder="Enter your first name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="first_name"
                            value="{{ old('first_name') }}"
                        />
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Last name
                        </label>
                        <input
                            type="text"
                            placeholder="Enter your last name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="last_name"
                            value="{{ old('last_name') }}"
                        />
                    </div>
                </div>

                <div class="mb-5.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email
                        </label>
                        <input
                            type="email"
                            placeholder="yourmail@gmail.com"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="email"
                            value="{{ old('email') }}"
                        />
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Role
                        </label>
                        <select name="role" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            <option value="" class="text-body">
                                Select Role
                            </option>
                            <!-- <option value="Root" class="text-body" {{ old('role') === 'Root' ? 'selected' : '' }}>Root</option>
                            <option value="Inspector" class="text-body" {{ old('role') === 'Inspector' ? 'selected' : '' }}>Inspector</option> -->
                            <option value="Real Estate Agent" class="text-body" {{ old('role') === 'Real Estate Agent' ? 'selected' : '' }}>Real Estate Agent</option>
                        </select>
                        </select>
                    </div>
                </div>

                <div class="mb-5.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Password
                        </label>
                        <input
                            name="password"
                            type="password"
                            placeholder="Enter your password"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            value="{{ old('password') }}"
                        />
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Confirm Password
                        </label>
                        <input
                            name="password_confirmation"
                            type="password"
                            placeholder="Confirm your password"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            value="{{ old('password_confirmation') }}"
                        />
                    </div>                       
                </div>

                <div class="flex flex-row-reverse gap-2">
                    <a href="{{ route('inspector.users.index') }}" class="flex justify-center rounded bg-gray p-3 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70">
                        Cancel
                    </a>    
                    <button class="flex justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                        Save New User
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection