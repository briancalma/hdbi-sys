<?php

namespace App\Livewire\Root\Users;

use App\Models\User;
use Livewire\Component;

class DeleteUserModal extends Component
{
    public function deActivateUser($userId)
    {
        $user = User::findOrFail($userId);

        $user->update([
            'status' => User::STATUS_DEACTIVED
        ]);

        request()->session()->flash('warning', 'User was deactivated successfully.');

        $this->redirect(
            url: route('root.users.index'), 
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.root.users.delete-user-modal');
    }
}
