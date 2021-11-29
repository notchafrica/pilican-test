<?php

namespace App\Http\Livewire\Customer;

use LivewireUI\Modal\ModalComponent;
use Monarobase\CountryList\CountryListFacade;

class Create extends ModalComponent
{
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
            'phone' => ["required_without:email"],
            'email' => ["required_without:phone", "email"],
        ]);

        $this->emit('customerSaved', $this->name);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.customer.create', ['countries' => []]);
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
