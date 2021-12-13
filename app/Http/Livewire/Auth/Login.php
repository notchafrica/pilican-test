<?php

namespace App\Http\Livewire\Auth;

use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $username = '';
    public $code = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'username' => ['required',],
        'code' => ['required', 'exists:companies,code'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $company = Company::whereCode($this->code)->first();

        if (!Auth::attempt(['username' => $this->username, 'password' => $this->password, 'company_id' => $company?->id ?: null], $this->remember)) {
            $this->addError('username', trans('auth.failed'));
            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
