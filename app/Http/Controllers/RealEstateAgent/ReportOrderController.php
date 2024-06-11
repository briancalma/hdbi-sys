<?php

namespace App\Http\Controllers\RealEstateAgent;

use App\Http\Controllers\Controller;
use App\Http\Requests\RealEstateAgent\CreateOrderDetailsFormRequest;
use App\Models\HandlingTime;
use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('real-estate-agent.report-orders.create');
    }

    public function showStep1()
    {
        return view('real-estate-agent.report-orders.report-order-form.step-1');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        // Store data in session
        Session::put('order.address', $request->address);

        return redirect()->route('real-estate-agent.report-orders.create.step-2'); // Redirect to step 2 (not impl
    }

    public function showStep2()
    {
        $packages = OrderType::query()->get();

        $handlingTimes = HandlingTime::query()->get();

        return view('real-estate-agent.report-orders.report-order-form.step-2')->with(
            compact('packages', 'handlingTimes')
        );
    }

    public function storeStep2(CreateOrderDetailsFormRequest $request)
    {
        $validated = $request->validated();        
        
        // Store data in session
        Session::put('order.order_notes', $validated['order_notes']);        
        Session::put('order.order_total_rooms', $validated['order_total_rooms']);
        Session::put('order.order_type_id', $validated['order_type_id']);
        // Session::put('order.order_have_second_dwelling', $validated['order_have_second_dwelling']);
        Session::put('order.order_dwelling_notes', $validated['order_dwelling_notes']);
        Session::put('order.order_handling_time_id', $validated['order_handling_time_id']);
        Session::put('order.order_preferred_contact', $validated['order_preferred_contact']);
        
        if($validated['order_preferred_contact'] != 'Self') {
            Session::put('order.order_contact_name', $validated['order_contact_name']);
            Session::put('order.order_contact_email', $validated['order_contact_name']);
            Session::put('order.order_contact_mobile_number', $validated['order_contact_mobile_number']);
        } else {
            Session::put('order.order_contact_name', auth()->user()->name);
            Session::put('order.order_contact_email', auth()->user()->email);
            // TODO: Uncomment this line when mobile number is added to the user table
            // Session::put('order.order_contact_mobile_number', auth()->user()->mobile_number);
        }
        
        return redirect()->route('real-estate-agent.report-orders.create.step-3'); 
    }

    public function showStep3()
    {
        return view('real-estate-agent.report-orders.report-order-form.step-3');
    }

    public function showOrderSummary()
    {
        return view('real-estate-agent.report-orders.report-order-form.order-summary');
    }

    public function showPaymentForm()
    {
        return view('real-estate-agent.report-orders.report-order-form.payment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
