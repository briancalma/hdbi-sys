@extends('layouts.app')

@section('title', 'Dashboard')

@section('action')
<a href="{{ route('real-estate-agent.report-orders.create.step-1') }}" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
    Order New Report
</a>
@endsection

@section('content')

@endsection