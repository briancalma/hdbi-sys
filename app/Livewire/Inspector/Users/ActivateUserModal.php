<?php

namespace App\Livewire\Inspector\Users;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ActivateUserModal extends Component
{
    public function activateUser($userId)
    {   
        $user = User::findOrFail($userId);

        try {

            $user->update([
                'status' => User::STATUS_ACTIVE
            ]);

            request()->session()->flash('success', 'User was activated successfully.');

            $this->redirect(
                url: route('inspector.users.index'), 
                navigate: true
            );
        }
        catch(\Exception $e) {
            request()->session()->flash('warning', 'Failed to activate user.');

            $this->redirect(
                url: route('inspector.users.index'), 
                navigate: true
            );
        }
    }


    public function render()
    {
        return view('livewire.inspector.users.activate-user-modal');
    }
}
