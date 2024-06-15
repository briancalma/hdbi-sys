@extends('layouts.app')

@section('title', 'Configurations Management')

@section('action')
    <a href="{{ route('root.configurations.create') }}" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
        Add New Config
    </a>
@endsection


@section('content')
    <div x-data="{modalOpen:false, configId:null}">
        <!-- ====== Table Section Start -->
        <livewire:root.configs-table />
        <!-- ====== Table Section End -->
    </div>
@endsection
