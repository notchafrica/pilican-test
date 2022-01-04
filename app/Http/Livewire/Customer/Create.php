<?php

namespace App\Http\Livewire\Customer;

use LivewireUI\Modal\ModalComponent;
use \Countries;
use WireUi\Traits\Actions;

class Create extends ModalComponent
{
    use Actions;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $country;
    public $city;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'phone' => ["nullable:email"],
            'email' => ["nullable:phone", "email"],
        ]);

        $user = auth()->user();

        $user->company->customers()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            "user_id" => $user->id,
        ]);

        $this->emit('customerSaved', $this->name);
        $this->closeModal();

        $this->reset();
    }
    public function render()
    {
        return view('livewire.customer.create', ['countries' => Countries::getList('en', 'php')]);
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
