<?php

namespace App\Http\Livewire\Auth;

use App\Models\Company;
use App\Notifications\AccountCreatedNotification;
use Illuminate\Support\Facades\App;
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

    public function complete()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'nullable|email',
            'phone' => 'required|phone:CM,AUTO',
        ]);

        $user = auth()->user();

        $profile = $user->profile()->create([
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

        $user->company_id = $profile->id;
        $user->save();


        $this->emit('profileCreated');
        $user->notify(new AccountCreatedNotification());

        //send account on server

        //jsdhjkh



        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.profile', ['countries' => \Countries::getList(App::getLocale(), "php")])->extends('layouts.setup');
    }
}
