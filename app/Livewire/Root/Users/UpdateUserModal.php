<?php

namespace App\Livewire\Root\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateUserModal extends Component
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $role;

    public User $user;

    public function updateUser()
    {
        $this->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'role' => 'required|string|in:Root,Inspector,Real Estate Agent',
        ]);

        try {

            $this->user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ]);
    
            $this->user->syncRoles([$this->role]);
            
            request()->session()->flash('success', 'User updated successfully.');

            $this->redirect(route('root.users.index'), navigate: true);
        }
        catch(\Exception $e) {
            request()->session()->flash('errors', 'Failed to update user. Please try again.');

            $this->redirect(route('root.users.index'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.root.users.update-user-modal');
    }

    #[On('user-edit')] 
    public function setUser($userId)
    {
        $this->user = User::findOrFail($userId);

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->role = $this->user->roles->first()->name;
    }
}
