<?php

namespace App\Http\Livewire\Stock\Category;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $name;
    public $description;
    public $company;
    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $this->company->categories()->create([
            'name' => $this->name,
            'description' => $this->description,
            "user_id" => auth()->id()
        ]);

        $this->emit('stockUpdated');
        $this->emit('categoryAdded');
        $this->dispatchBrowserEvent('categoryAdded');
        $this->dispatchBrowserEvent('stockUpdated');
        $this->closeModal();
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.stock.category.create');
    }
}
