<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class Users extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.list');
    }
}
