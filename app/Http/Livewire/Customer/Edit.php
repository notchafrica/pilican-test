<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $country;
    public $city;
    public $customer;
    public function mount($customer)
    {
        $this->customer = Customer::findOrFail($customer);
        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
        $this->country = $this->customer->country;
        $this->city = $this->customer->city;
    }
    public function render()
    {
        return view('livewire.customer.edit', ['countries' => Countries::getList('en', 'php')]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'phone' => ["required_without:email"],
            'email' => ["required_without:phone", "email"],
        ]);

        $this->customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
        ]);

        $this->emit('customerSaved', $this->name);

        $this->reset();
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
