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
        // // Store data in session
        // Session::put('order.address', $request->address);

        // return redirect()->route('real-estate-agent.report-orders.create.step-2'); // Redirect to step 2 (not impl
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
