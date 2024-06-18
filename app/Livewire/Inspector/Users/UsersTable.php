<?php

namespace App\Livewire\Inspector\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::role('Real Estate Agent')->simplePaginate(10);

        return view('livewire.inspector.users.users-table', [
            'users' => $users,
        ]);
    }
}
