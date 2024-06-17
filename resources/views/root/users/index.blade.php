@extends('layouts.app')

@section('title', 'Users Management')

@section('content')
<!-- ====== Table Section Start -->
 <div class="flex flex-col gap-3">
    <div class="flex flex-row justify-end items-end">
        <button @click="modalOpen=true; modal='create-config-modal';" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            Add New User
        </button>
    </div>
        

    <div>
        <livewire:root.users.users-table />
    </div>
 </div>

@endsection