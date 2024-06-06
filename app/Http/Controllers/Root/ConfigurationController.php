<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests\Root\CreateConfigFormRequest;
use App\Models\Configuration;
use Illuminate\Http\Request;
use PSpell\Config;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurations = \App\Models\Configuration::query()->paginate(10);

        return view('root.configurations.index', compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('root.configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateConfigFormRequest $request)
    {
        try {
            $data = $request->validated();

            $configuration = Configuration::create($data);
    
            return redirect()->route('root.configurations.index')->with('success', 'Config created successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('root.configurations.create')->with('error', 'Failed to create config.');
        }
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
