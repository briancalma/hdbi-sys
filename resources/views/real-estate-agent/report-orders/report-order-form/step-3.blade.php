@extends('layouts.app')

@section('title', 'Order New Report')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Step 3: Additional Information
        </h3>
    </div>

    <form method="POST" action="{{ route('root.configurations.store') }}" x-data="{ type: 'string' }">
        <div class="p-6.5">
            <div class="mb-5 flex flex-col gap-6 xl:flex-row">
                
            </div>
        </div>
    </form>
</div>
@endsection