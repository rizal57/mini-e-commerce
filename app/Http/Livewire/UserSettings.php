<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSettings extends Component
{
    public $id_user = 0, $nama, $phone_number, $address;
    protected $listeners = [
        'userUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.user-settings');
    }

    public function showUserForm()
    {
        $this->id_user = auth()->user()->id;
        $this->nama = auth()->user()->name;
        $this->phone_number = auth()->user()->phone_number;
        $this->address = auth()->user()->address;
    }

    public function updateUser()
    {
        $user = User::find(auth()->user()->id);
        $user->name = $this->nama;
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->save();
        $this->id_user = 0;

        $this->emit('userUpdated');
    }
}
