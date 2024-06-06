<?php

namespace App\Http\Controllers\Inspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inspector\CreateUserFormRequest;
use App\Http\Requests\Inspector\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('Real Estate Agent')->paginate(10);

        return view('inspector.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inspector.users.create');
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
    
            return redirect()->route('inspector.users.index')->with('success', 'User created successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('inspector.users.create')->with('error', 'Failed to create user.');
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
    public function edit(User $user)
    {
        return view('inspector.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, User $user)
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

            return redirect()->route('inspector.users.index')->with('success', 'User account was updated successfully.');
        } catch(\Exception $e) {
            return redirect()->route('inspector.users.edit', $user)->with('error', 'Failed to update user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('inspector.users.index')->with('warning', 'User account was deactivated successfully.');
        }
        catch(\Exception $e) {
            return redirect()->route('inspector.users.index')->with('error', 'Failed to delete user.');
        }
    }
}
