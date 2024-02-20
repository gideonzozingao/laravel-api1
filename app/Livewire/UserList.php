<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{    public $layout = 'layouts.app';
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.users.list', [
            'users' => $users
        ]);
    }
}
