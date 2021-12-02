<?php

namespace App\Http\Livewire\Customer\Actions;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddCredit extends ModalComponent
{
    public $customer;
    public $amount;
    public $reason;
    public $method = "cash";
    public $reference;

    public function mount($customer)
    {
        $this->customer = Customer::whereId($customer)->whereCompanyId(auth()->user()->company->id)->first();
    }

    public function render()
    {
        return view('livewire.customer.actions.add-credit');
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric',
            "reason" => ['required'],
            "method" => ["required", "in:cash,digital"],
            "reference" => ["nullable", "unique:transactions,reference"],
        ]);

        DB::beginTransaction();

        try {
            $this->customer->transactions()->create([
                "amount" => $this->amount,
                "type" => "credit",
                "method" => $this->method,
                "reason" => $this->reason,
                "reference" => $this->method == "digital" ? $this->reference : Str::random(12),
                "user_id" => auth()->user()->id,
                "company_id" => auth()->user()->company->id,
            ]);

            $this->customer->balance = $this->customer->balance + $this->amount;
            $this->customer->save();

            DB::commit();
            $this->emit('customerUpdated');
            $this->closeModal();
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();
        }
    }
}
