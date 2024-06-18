<div>
    <div class="overflow-hidden rounded-[10px]">
        <div class="max-w-full overflow-x-auto">
            <div class="min-w-[1170px]">
                <!-- table header start -->
                <div class="grid grid-cols-12 bg-[#F9FAFB] px-5 py-4 dark:bg-meta-4 lg:px-7.5 2xl:px-11">
                    <div class="col-span-2">
                        <h5 class="font-medium text-[#637381] dark:text-bodydark">NAME</h5>
                    </div>

                    <div class="col-span-3">
                        <h5 class="font-medium text-[#637381] dark:text-bodydark">EMAIL</h5>
                    </div>

                    <div class="col-span-3">
                        <h5 class="font-medium text-[#637381] dark:text-bodydark">STATUS</h5>
                    </div>

                    <div class="col-span-2">
                        <h5 class="font-medium text-[#637381] dark:text-bodydark">ROLE</h5>
                    </div>
                </div>
                <!-- table header end -->

                <!-- table body start -->
                <div class="bg-white dark:bg-boxdark">
                    <!-- table row item -->
                    @foreach($users as $user)
                        <div wire:key="{{ $user->id }}" class="grid grid-cols-12 border-t border-[#EEEEEE] px-5 py-4 dark:border-strokedark lg:px-7.5 2xl:px-11">
                            <div class="col-span-2">
                                <p class="text-[#637381] dark:text-bodydark">
                                    {{ $user->fullName }}
                                </p>
                            </div>

                            <div class="col-span-3">
                                <p class="text-[#637381] dark:text-bodydark">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div class="col-span-3">
                                <p class="text-[#637381] dark:text-bodydark">
                                    <x-user-status-badge :status="$user->status" />
                                </p>
                            </div>

                            <div class="col-span-2">
                                <p class="text-[#637381] dark:text-bodydark">
                                    @include('components.role-badge', ['roleName' => $user->roleName])
                                </p>
                            </div>
                            
                            <div class="flex items-center space-x-3.5">
                                <button 
                                    @click="$dispatch('user-edit', { userId: {{ $user->id }} }); modalOpen = true; modal = 'update-user-modal';"
                                    class="hover:text-primary text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                
                                @if($user->status === 'active')
                                    <button @click="modalOpen=true; userId={{ $user->id }}; modal = 'confirm-deactivate-user-modal'" class="hover:text-primary text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="18" height="18" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                        </svg>
                                    </button>
                                @else
                                    <button @click="modalOpen=true; userId={{ $user->id }}; modal = 'confirm-activate-user-modal'"  class="hover:text-primary text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach              
                
                </div>
                <!-- table body end -->
            </div>
        </div>
    </div>

    <div class="my-10">
        {{ $users->links() }}
    </div>
</div>
