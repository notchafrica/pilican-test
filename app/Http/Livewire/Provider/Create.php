<?php

namespace App\Http\Livewire\Provider;

use Illuminate\Support\Facades\App;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $city;
    public $country;
    public $about;
    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'about' => 'required',
        ]);

        $user = auth()->user();

        $provider = $user->company->providers()->create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'about' => $this->about,
            'user_id' => $user->id
        ]);

        $this->emit('providerSaved', $this->name);
        $this->closeModal();

        $this->reset();
    }
    public function render()
    {
        return view('livewire.provider.create', ["countries" => \Countries::getList(App::getLocale(), 'php')]);
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
}
