<div 
    x-show="modalOpen && modal == 'update-user-modal'" 
    x-transition 
    class="fixed left-0 top-0 z-99999 flex h-screen w-full justify-center overflow-y-scroll bg-black/80 px-4 py-5"
    x-on:config-created="modalOpen = false; modal = '';">
  <div @click.outside="modalOpen = false; modal = '';"  class="relative m-auto w-full max-w-180 rounded-sm border border-stroke bg-gray shadow-default dark:border-strokedark dark:bg-meta-4 sm:p-8">
    
    <div class="flex flex-row items-center justify-between mb-2">
        <h3 class="font-medium text-black dark:text-white text-2xl">
            Update User Form
        </h3>

        <button @click="modalOpen = false">
            <x-icons.close :width="15" :height="15"/>
        </button>
    </div>
  
    <form class="my-1" wire:submit="updateUser()">
        <div class="p-1 my-3">
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <x-input-text 
                        name="first_name" 
                        label="Firstname" 
                        placeholder="* Enter Firstname" 
                        wire:model="first_name" 
                        required/>
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <x-input-text 
                        name="last_name"
                        label="Lastname" 
                        placeholder="* Enter Lastname" 
                        wire:model="last_name" 
                        required/>
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <x-input-email
                        type="email" 
                        name="email"
                        label="Email Address" 
                        placeholder="* Enter Email Address" 
                        wire:model="email" 
                        required/>
                </div>
            </div>

            <div class="mb-5.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Role
                    </label>
                    <select wire:model="role"
                        name="role" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="" class="text-body">
                            Select Role
                        </option>
                        <option value="Root" class="text-body">Root</option>
                        <option value="Inspector" class="text-body">Inspector</option>
                        <option value="Real Estate Agent" class="text-body">Real Estate Agent</option>
                    </select>
                    
                    <div class="text-danger text-sm">@error($role) {{ $message }} @enderror</div>
                </div>
            </div>
            
            
            <div class="flex flex-row-reverse gap-2">
                <a @click="modalOpen = false; modal = '';" class="flex justify-center rounded bg-gray p-3 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70">Cancel</a>    
                <button type="submit" class="flex justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                    Save User
                </button>
            </div>
        </div>
    </form>
  </div>
</div>
