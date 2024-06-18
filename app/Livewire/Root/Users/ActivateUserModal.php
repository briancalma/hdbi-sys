<?php

namespace App\Livewire\Root\Users;

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
                url: route('root.users.index'), 
                navigate: true
            );
        }
        catch(\Exception $e) {
            request()->session()->flash('warning', 'Failed to activate user.');

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
