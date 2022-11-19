<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class UserSettings extends Component
{
    public $id_user = 0, $nama, $phone_number, $address;
    public $daftarProvinsi = [], $daftarKota = [];
    public $provinsi_id, $kota_id, $province, $city_name;
    protected $listeners = [
        'userUpdated' => 'render'
    ];

    public function render()
    {
        $this->daftarProvinsi = RajaOngkir::provinsi()->all();
        if($this->provinsi_id) {
            $this->daftarKota = RajaOngkir::kota()->dariProvinsi($this->provinsi_id)->get();
        }
        $this->province = RajaOngkir::provinsi()->find(auth()->user()->provinsi_id);
        $this->city_name = RajaOngkir::kota()->dariProvinsi(auth()->user()->provinsi_id)->find(auth()->user()->kota_id);
        return view('livewire.user-settings');
    }

    public function showUserForm()
    {
        $this->id_user = auth()->user()->id;
        $this->nama = auth()->user()->name;
        $this->phone_number = auth()->user()->phone_number;
        $this->address = auth()->user()->address;
        $this->provinsi_id = auth()->user()->provinsi_id;
        $this->kota_id = auth()->user()->kota_id;
    }

    public function updateUser()
    {
        $user = User::find(auth()->user()->id);
        $user->name = $this->nama;
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->provinsi_id = $this->provinsi_id;
        $user->kota_id = $this->kota_id;

        if(empty($user->phone_number)) {
            return session()->flash('failed', 'Harap lengkapi data kontak dulu yaa...');
        }

        if(empty($user->address) || empty($user->provinsi_id) || empty($user->kota_id)) {
            return session()->flash('failed', 'Harap lengkapi data alamat dulu yaa...');
        }
        $user->save();
        $this->id_user = 0;

        $this->emit('userUpdated');
    }
}
