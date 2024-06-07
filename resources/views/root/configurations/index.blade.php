@extends('layouts.app')

@section('title', 'Configurations Management')

@section('action')
<a href="{{ route('root.configurations.create') }}" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
    Add New Config
</a>
@endsection


@section('content')
<!-- ====== Table Four Start -->
<div class="overflow-hidden rounded-[10px]">
    <div class="max-w-full overflow-x-auto">
        <div class="min-w-[1170px]">
        <!-- table header start -->
        <div class="grid grid-cols-12 bg-[#F9FAFB] px-5 py-4 dark:bg-meta-4 lg:px-7.5 2xl:px-11">
            
            <div class="col-span-3">
                <h5 class="font-medium text-[#637381] dark:text-bodydark">CONFIG</h5>
            </div>

            <div class="col-span-3">
                <h5 class="font-medium text-[#637381] dark:text-bodydark">VALUE</h5>
            </div>

            <div class="col-span-3">
                <h5 class="font-medium text-[#637381] dark:text-bodydark">TYPE</h5>
            </div>

            <div class="col-span-3">
                <h5 class="font-medium text-[#637381] dark:text-bodydark">ACTIONS</h5>
            </div>

            <!-- <div class="col-span-2">
                <h5 class="font-medium text-[#637381] dark:text-bodydark">ROLE</h5>
            </div> -->
        </div>
        <!-- table header end -->

        <!-- table body start -->
        <div class="bg-white dark:bg-boxdark">
            <!-- table row item -->
            @foreach($configurations as $item)
                <div class="grid grid-cols-12 border-t border-[#EEEEEE] px-5 py-4 dark:border-strokedark lg:px-7.5 2xl:px-11">
                    
                    <div class="col-span-3">
                        <p class="text-[#637381] dark:text-bodydark">
                            {{ $item->key }}
                        </p>
                    </div>

                    <div class="col-span-3">
                        <p class="text-[#637381] dark:text-bodydark">
                            {{ $item->value }}
                        </p>
                    </div>

                    <div class="col-span-3">
                        <p class="text-[#637381] dark:text-bodydark">
                            @include('components.config-type-badge', ['type' => $item->type])
                        </p>
                    </div>

                    <div class="col-span-2">
                        <div class="flex flex-row gap-7">
                            <a href="{{ route('root.configurations.edit', $item) }}" class="hover:text-primary text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <button @click="modalOpen = true; modalType = 'deleteConfigModal'; configId = {{ $item->id }}"  class="hover:text-primary text-danger">
                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z" fill=""></path>
                                <path d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z" fill=""></path>
                                <path d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z" fill=""></path>
                                <path d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z" fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach                    
        
        </div>
        <!-- table body end -->
    </div>
</div>
<!-- ====== Table Four End -->   

<div class="my-2">{{ $configurations->links() }}</div>
<!-- ====== Table Section End -->

<div>
    <div x-show="modalOpen && modalType == 'deleteConfigModal'" x-transition="" class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-black/80 px-4 py-5">
        <div @click.outside="modalOpen = false" class="w-full max-w-142.5 rounded-lg bg-white px-8 py-12 text-center dark:bg-boxdark md:px-17.5 md:py-15">
            <span class="mx-auto inline-block">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.1" width="60" height="60" rx="30" fill="#DC2626"></rect>
                    <path d="M30 27.2498V29.9998V27.2498ZM30 35.4999H30.0134H30ZM20.6914 41H39.3086C41.3778 41 42.6704 38.7078 41.6358 36.8749L32.3272 20.3747C31.2926 18.5418 28.7074 18.5418 27.6728 20.3747L18.3642 36.8749C17.3296 38.7078 18.6222 41 20.6914 41Z" stroke="#DC2626" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            
            <h3 class="mt-5.5 pb-2 text-3xl font-bold text-black dark:text-white sm:text-2xl">
                Delete Config
            </h3>

            <p class="mb-10 font-medium">
                Are you sure you want to delete this config?
            </p>
            <div class="-mx-3 flex flex-wrap gap-y-4">
                <div class="w-full px-3 2xsm:w-1/2">
                    <button @click="modalOpen = false; modalType=''" class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
                    Cancel
                    </button>
                </div>
                <div class="w-full px-3 2xsm:w-1/2">
                    <form method="POST" :action="'/root/configurations/' + configId">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block w-full rounded border border-meta-1 bg-meta-1 p-3 text-center font-medium text-white transition hover:bg-opacity-90">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection