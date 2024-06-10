@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <!-- ====== Forms Section Start -->
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="flex flex-wrap items-center">
            <div class="hidden w-full xl:block xl:w-1/2">
                <div class="px-26 py-17.5 text-center">
                    <p class="font-medium 2xl:px-20">Your First Choice for Building & Timber Pest Inspections</p>

                    <span class="mt-15 inline-block">
                    <img
                        src="{{ asset('images/illustration/illustration-03.svg')}}"
                        alt="illustration"
                    />
                    </span>
                </div>
            </div>
            <div class="w-full border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
            <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                <!-- <span class="mb-1.5 block font-medium">Start for free</span> -->
                <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                    Register to {{ config('app.name') }}
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="flex w-full border-l-6 border-[#F87171] bg-[#F87171] bg-opacity-[15%] px-7 py-8 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9">
                            <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z" fill="#ffffff" stroke="#ffffff"></path>
                                </svg>
                            </div>
                            <div class="w-full">
                                <h5 class="mb-3 font-bold text-[#B45454]">
                                    There were {{ $errors->count() }} errors with your submission
                                </h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="leading-relaxed text-[#CD5D5D]">
                                            - {{ $error }}
                                        </li>
                                    @endforeach    
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    <div class="my-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Firstname</label>
                        
                        <div class="relative">
                            <input
                                name="first_name"
                                type="text"
                                placeholder="Enter your firstname"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                value="{{ old('first_name') }}"
                                required
                            />
                        </div>
                    </div>

                    <div class="my-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Lastname</label>
                        
                        <div class="relative">
                            <input
                                name="last_name"
                                type="text"
                                placeholder="Enter your last_name"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                value="{{ old('last_name') }}"
                                required
                            />
                        </div>
                    </div>


                    <div class="my-4">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                        
                        <div class="relative">
                            <input
                                name="email"
                                type="email"
                                placeholder="Enter your email"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                value="{{ old('email') }}"
                                autofocus 
                                autocomplete="email"
                                required
                            />

                            <span class="absolute right-4 top-4">
                                <svg
                                class="fill-current"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g opacity="0.5">
                                    <path
                                    d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                    fill=""
                                    />
                                </g>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Password</label>
                        
                        <div class="relative">
                            <input
                                name="password"
                                type="password"
                                placeholder="Enter your password"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                autocomplete="current-password"
                                required 
                            />

                            <span class="absolute right-4 top-4">
                                <svg
                                class="fill-current"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g opacity="0.5">
                                    <path
                                    d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z"
                                    fill=""
                                    />
                                    <path
                                    d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z"
                                    fill=""
                                    />
                                </g>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="mb-2.5 block font-medium text-black dark:text-white">Confirm Password</label>
                        
                        <div class="relative">
                            <input
                                name="password_confirmation"
                                type="password"
                                placeholder="Re-Enter your password"
                                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                autocomplete="current-password"
                                required 
                            />

                            <span class="absolute right-4 top-4">
                                <svg
                                class="fill-current"
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g opacity="0.5">
                                    <path
                                    d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z"
                                    fill=""
                                    />
                                    <path
                                    d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z"
                                    fill=""
                                    />
                                </g>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <input
                        type="submit"
                        value="Register"
                        class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
                        />
                    </div>

                    <div class="mt-6 text-center">
                        <p class="font-medium">
                            Have an account?
                            <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </p>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- ====== Forms Section End -->
@endsection