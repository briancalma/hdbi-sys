<?php

namespace App\Livewire\Inspector\Users;

use App\Models\User;
use Livewire\Component;

class DeleteUserModal extends Component
{
    public function deActivateUser($userId)
    {
        $user = User::findOrFail($userId);

        try {
            $user->update([
                'status' => User::STATUS_DEACTIVED
            ]);
    
            request()->session()->flash('warning', 'User was deactivated successfully.');
    
            $this->redirect(
                url: route('inspector.users.index'), 
                navigate: true
            );
        }
        catch(\Exception $e) {
            request()->session()->flash('warning', 'Failed to deactivate user.');

            $this->redirect(
                url: route('inspector.users.index'), 
                navigate: true
            );
        }
    }


    public function render()
    {
        return view('livewire.inspector.users.delete-user-modal');
    }
}
