@extends('layouts.app')

@section('title', 'Users Management')

@section('content')
<!-- ====== Table Section Start -->
 <div class="flex flex-col gap-3" x-data="{userId: null}">
    <div class="flex flex-row justify-end items-end">
        <button @click="modalOpen=true; modal='create-user-modal';" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            Add New User
        </button>
    </div>

    <div>
        <livewire:root.users.users-table />
        <livewire:root.users.create-user-modal />
        <livewire:root.users.update-user-modal />
        <livewire:root.users.delete-user-modal />
    </div>
 </div>

@endsection