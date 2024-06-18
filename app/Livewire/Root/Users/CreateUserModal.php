<?php

namespace App\Livewire\Root\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUserModal extends Component
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;
    public string $password_confirmation;
    public string $role;

    public function createUser()
    {
        $this->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|string|in:Root,Inspector,Real Estate Agent',
        ]);

        try {
            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
    
            $user->assignRole($this->role);
            
            request()->session()->flash('success', 'User added successfully.');

            $this->redirect(route('root.users.index'), navigate: true);
        }
        catch(\Exception $e) {
            request()->session()->flash('errors', 'Failed to add user. Please try again.');

            $this->redirect(route('root.users.index'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.root.users.create-user-modal');
    }
}
