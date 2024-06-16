<div x-show="modalOpen && modal == 'confirm-delete-config-modal'" class="fixed left-0 top-0 flex h-full min-h-screen w-full items-center justify-center bg-black/80 px-4 py-5"
x-on:config-deleted="modalOpen = false; modal = '';"
>
    <div @click.outside="modalOpen = false" class="w-full max-w-142.5 rounded-lg bg-white px-8 py-12 text-center dark:bg-boxdark md:px-17.5 md:py-15">
        <span class="mx-auto inline-block">
            <x-icons.alert/>
        </span>
        
        <h3 class="mt-5.5 pb-2 text-3xl font-bold text-black dark:text-white sm:text-2xl">
            Delete Config
        </h3>

        <p class="mb-10 font-medium">
            Are you sure you want to delete this config?
        </p>
        <div class="-mx-3 flex flex-wrap gap-y-4">
            <div class="w-full px-3 2xsm:w-1/2">
                <button @click="modalOpen = false;" class="block w-full rounded border border-stroke bg-gray p-3 text-center font-medium text-black transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:bg-meta-4 dark:text-white dark:hover:border-meta-1 dark:hover:bg-meta-1">
                Cancel
                </button>
            </div>
            <div class="w-full px-3 2xsm:w-1/2">
                <button wire:click="deleteConfig(configId)" type="button" class="block w-full rounded border border-meta-1 bg-meta-1 p-3 text-center font-medium text-white transition hover:bg-opacity-90">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>