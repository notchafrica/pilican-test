<?php

namespace App\Http\Livewire\Provider;

use App\Models\Provider;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    public $name;
    public $phone;
    public $email;
    public $address;
    public $city;
    public $country;
    public $about;
    public $provider;

    public function mount($provider)
    {
        $provider = Provider::findOrFail($provider);
        $this->name = $provider->name;
        $this->phone = $provider->phone;
        $this->email = $provider->email;
        $this->address = $provider->address;
        $this->city = $provider->city;
        $this->country = $provider->country;
        $this->about = $provider->about;
        $this->provider = $provider;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->provider->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'about' => $this->about,
        ]);

        $this->emit('providerSaved', $this->name);

        $this->reset();
        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.provider.edit', ['countries' => \Countries::getList(App::getLocale(), "php")]);
    }
}
