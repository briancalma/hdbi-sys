<?php

namespace App\Livewire\Root\Users;

use App\Models\User;
use Livewire\Component;

class ActivateUserModal extends Component
{
    public function activateUser($userId)
    {   
        try {
            $user = User::findOrFail($userId);

            $user->update([
                'status' => User::STATUS_ACTIVE
            ]);

            request()->session()->flash('success', 'User was activated successfully.');

            $this->redirect(
                url: route('root.users.index'), 
                navigate: true
            );
        }
        catch(\Exception $e) {
            request()->session()->flash('warning', 'Cannot activate user.');

            $this->redirect(
                url: route('root.users.index'), 
                navigate: true
            );
        }
    }


    public function render()
    {
        return view('livewire.root.users.activate-user-modal');
    }
}
