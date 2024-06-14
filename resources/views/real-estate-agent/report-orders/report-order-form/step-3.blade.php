@extends('layouts.app')

@section('title', 'Order New Report')

@section('content')
<div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Step 3: Review and Submit
        </h3>
    </div>

    
    <div class="p-6.5 flex flex-row">
        <div class="flex flex-row">
            <div>
                <label for="">Order Notes</label>
                <p>{{ session('order.order_notes') }}</p>
            </div>
            <div>
                <label for="">Total Rooms</label>
                <p>{{ session('order.order_total_rooms') }}</p>
            </div>
            <div>
                <label for="">Order Type</label>
                <p>{{ session('order.order_type_id') }}</p>
            </div> 

            <div>
                <label for="">Order Dwelling Notes</label>
                <p>{{ session('order.order_dwelling_notes') }}</p>
            </div>

            <div>
                <label for="">Order Handling Time</label>
                <p>{{ session('order.order_handling_time_id') }}</p>
            </div>

            <div>
                <label for="">Preferred Contact</label>
                <p>{{ session('order.order_preferred_contact') }}</p>
            </div>

            <div>
                <label for="">Contact Name</label>
                <p>{{ session('order.order_contact_name') }}</p>
            </div>

            <div>
                <label for="">Contact Email</label>
                <p>{{ session('order.order_contact_email') }}</p>
            </div>
        </div>
    </div>

</div>
@endsection