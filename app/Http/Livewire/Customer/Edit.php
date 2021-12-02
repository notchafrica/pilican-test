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
        $customer = Customer::findOrFail($customer);
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
        $this->country = $customer->country;
        $this->city = $customer->city;
        $this->customer = $customer;
    }
    public function render()
    {
        return view('livewire.customer.edit', ['countries' => \Countries::getList('en', 'php')]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
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
        $this->closeModal();
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
