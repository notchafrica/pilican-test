<?php

namespace App\Http\Livewire\Auth;

use App\Models\Company;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $phone;
    public $country;
    public $city;
    public $address;
    public $about;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'nullable|email',
            'phone' => 'required|phone',
        ]);

        $company = Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
            'about' => $this->about,
            "user_id" => auth()->id(),
            "owner" => true
        ]);



        /* $aut

        auth()->user()->company()->create([]) */
    }

    public function render()
    {
        return view('livewire.auth.profile')->extends('layouts.setup');
    }
}
