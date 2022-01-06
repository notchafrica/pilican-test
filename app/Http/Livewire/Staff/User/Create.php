<?php

namespace App\Http\Livewire\Staff\User;

use App\Notifications\UserNotification;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{
    public $name;
    public $email;
    public $phone;
    public $company;
    public $roles = [];
    public $password;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([
            'name' => ['required'],
            'phone' => ['required', 'phone:CM,AUTO'],
            'email' => ['nullable', 'email'],
            'password' => ['required', 'min:8'],
            'roles' => ['required'],
            'roles.*' => ['required', 'exists:roles,id'],
        ]);

        $user = $this->company->users()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'email_verified_at' => now()
        ]);

        foreach ($this->roles as $role) {
            $user->assignRole(Role::findById((int) $role));
        }

        $this->emit('userCreated');

        $user->notify(new UserNotification($this->password));

        $this->closeModal();
    }
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public function render()
    {
        return view('livewire.staff.user.create', ['jroles' => Role::where('name', '<>', 'super-admin')->get()]);
    }
}
