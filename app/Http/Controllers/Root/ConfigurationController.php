<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests\Root\CreateConfigFormRequest;
use App\Http\Requests\Root\UpdateConfigFormRequest;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PSpell\Config;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $configurations = \App\Models\Configuration::query()->paginate(10);
        // return view('root.configurations.index', compact('configurations'));
        return view('root.configurations.index');
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

            if($data['type'] == 'boolean') {
                $data['value'] = strtolower($data['value']);
            }

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
    public function edit(Configuration $configuration)
    {
        return view('root.configurations.edit', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigFormRequest $request, Configuration $configuration)
    {
        try {
            $data = $request->validated();

            if($data['type'] == 'boolean') {
                $data['value'] = strtolower($data['value']);
            }

            $configuration->update($data);

            return redirect()->route('root.configurations.index')->with('success', 'Config updated successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('root.configurations.edit', $configuration)->with('error', 'Failed to update config.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $configuration)
    {
        try {
            $configuration->delete();

            return redirect()->route('root.configurations.index')->with('warning', 'Config was deleted successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('root.configurations.index')->with('error', 'Failed to delete config.');
        }
    }
}
