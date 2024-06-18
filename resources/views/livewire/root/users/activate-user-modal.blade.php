<div x-show="modalOpen && modal == 'confirm-activate-user-modal';" class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-black/80 px-4 py-5"
x-on:config-deleted="modalOpen = false; modal = '';"
>
    <div @click.outside="modalOpen = false; modal = '';" class="w-full max-w-142.5 rounded-lg bg-white px-8 py-12 text-center dark:bg-boxdark md:px-17.5 md:py-15">
        <span class="mx-auto inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#33FF33" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
            </svg>
        </span>
        
        <h3 class="mt-5.5 pb-2 text-3xl font-bold text-black dark:text-white sm:text-2xl">
            Activate User
        </h3>

        <p class="mb-10 font-medium">
            Are you sure you want to activate this user?
        </p>
        <div class="-mx-3 flex flex-wrap gap-y-4">
            <div class="w-full px-3 2xsm:w-1/2">
                <button @click="modalOpen = false; modal = '';" class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
                Cancel
                </button>
            </div>
            <div class="w-full px-3 2xsm:w-1/2">
                <button wire:click="activateUser(userId)" type="button" class="block w-full rounded border border-primary bg-primary p-3 text-center font-medium text-white transition hover:bg-opacity-90">
                    Activate
                </button>
            </div>
        </div>
    </div>
</div>