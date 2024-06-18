<div 
    x-show="modalOpen && modal == 'update-config-modal'" 
    x-transition 
    class="fixed left-0 top-0 z-99999 flex h-screen w-full justify-center overflow-y-scroll bg-black/80 px-4 py-5"
    x-on:config-updated="modalOpen = false; modal = '';">
  <div @click.outside="modalOpen = false; modal = '';"  class="relative m-auto w-full max-w-180 rounded-sm border border-stroke bg-gray shadow-default dark:border-strokedark dark:bg-meta-4 sm:p-8">
    
    <div class="flex flex-row items-center justify-between mb-2">
        <h3 class="font-medium text-black dark:text-white text-2xl">
            Update Config Form
        </h3>

        <button @click="modalOpen = false; modal = '';">
            <x-icons.close :width="15" :height="15"/>
        </button>
    </div>
  
    <form class="my-1" wire:submit.prevent="updateConfig()">
        <div class="p-1 my-3">
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <x-input-text label="Key" name="key" wire:model="key" placeholder="Enter key" required/>
                </div>
            </div>

            <div class="mb-5.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-md font-medium text-black dark:text-white">
                        Type
                    </label>
                    <select wire:model="type" name="type" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Type
                        </option>
                        <option value="integer" class="text-body" {{ old('type') === 'integer' ? 'selected' : '' }}>integer</option>
                        <option value="string" class="text-body" {{ old('type') === 'string' ? 'selected' : '' }}>string</option>
                        <option value="boolean" class="text-body" {{ old('type') === 'boolean' ? 'selected' : '' }}>boolean</option>
                    </select> 

                    <div class="text-danger text-sm">@error($type) {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <x-input-text label="Value" name="value" wire:model="value" placeholder="Enter config value" required/>
                </div>
            </div>
            
            <div class="flex flex-row-reverse gap-2">
                <a @click="modalOpen = false; modal = '';" class="flex justify-center rounded bg-gray p-3 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70">Cancel</a>    
                <button type="submit" class="flex justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
  </div>
</div>
