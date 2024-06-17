<?php

namespace App\Livewire\Root\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::where('id', '!=', auth()->user()->id)->simplePaginate(10);

        return view('livewire.root.users.users-table', [
            'users' => $users,
        ]);
    }
}
