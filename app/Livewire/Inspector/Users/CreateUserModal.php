<?php

namespace App\Livewire\Inspector\Users;

use App\Constants\Roles;
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

    public function createUser()
    {
        $this->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        try {
            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
    
            $user->assignRole(Roles::REAL_ESTATE_AGENT);
            
            request()->session()->flash('success', 'User added successfully.');

            $this->redirect(route('inspector.users.index'), navigate: true);
        }
        catch(\Exception $e) {
            request()->session()->flash('errors', ['Failed to add user. Please try again.']);

            $this->redirect(route('inspector.users.index'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.inspector.users.create-user-modal');
    }
}
