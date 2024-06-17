<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests\Root\CreateUserFormRequest;
use App\Http\Requests\Root\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $users = User::where('id', '!=', auth()->user()->id)->paginate(10);

        return view('root.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('root.users.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserFormRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
    
            $user->assignRole($data['role']);
    
            return redirect()->route('root.users.index')->with('success', 'User created successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('root.users.create')->with('error', 'Failed to create user.');
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
    public function edit(User $user): View
    {
        return view('root.users.edit')->with(compact('user'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, User $user): RedirectResponse
    {
        try 
        {
            $data = $request->validated();

            if(isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            $updatedUserCredentials = collect($data)->except('role')->toArray();

            $user->update($updatedUserCredentials);   

            $user->syncRoles([$data['role']]);

            return redirect()->route('root.users.index')->with('success', 'User account was updated successfully.');
        } catch(\Exception $e) {
            return redirect()->route('root.users.edit', $user)->with('error', 'Failed to update user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();

            return redirect()->route('root.users.index')->with('warning', 'User account was deactivated successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('root.users.index')->with('error', 'Failed to delete user.');
        }
    }
}
