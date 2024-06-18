<?php

namespace App\Livewire\Inspector\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateUserModal extends Component
{
    public string $first_name;
    public string $last_name;
    public string $email;

    public User $user;

    public function updateUser()
    {
        $this->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        try {

            $this->user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ]);
                    
            request()->session()->flash('success', 'User updated successfully.');

            $this->redirect(route('inspector.users.index'), navigate: true);
        }
        catch(\Exception $e) {
            request()->session()->flash('errors', 'Failed to update user. Please try again.');

            $this->redirect(route('inspector.users.index'), navigate: true);
        }
    }

    #[On('user-edit')] 
    public function setUser($userId)
    {
        $this->user = User::findOrFail($userId);

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.inspector.users.update-user-modal');
    }
}
