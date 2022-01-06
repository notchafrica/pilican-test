<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class Details extends ModalComponent
{
    use Actions;
    public $order;
    public $tax = false;
    public $amount;
    public $fees_amount;
    public $trade_amount;
    public $quantity_amount;
    public $shipping_amount;
    public $reason;
    public $method = "cash";
    public $existing = 'inconito';
    public $name, $phone, $email, $customer_id;
    public $trade = [
        "show" => false,
        "amount" => 0,
    ];
    public $fees = [
        "show" => false,
        "amount" => 0,
    ];
    public $quantity = [
        "show" => false,
        "amount" => 0,
    ];
    public $shipping = [
        "show" => false,
        "amount" => 0,
    ];

    public $country = "cm";


    public function mount(Order $order)
    {
        $this->order = $order;
        $this->amount = $order->amount;
        $this->company = auth()->user()->company;
    }

    public function addFees()
    {
        $this->fees = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addTrade()
    {
        $this->trade = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addShipping()
    {
        $this->shipping = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function addQuantity()
    {
        $this->quantity = [
            "show" => true,
            "amount" => 0,
        ];
    }

    public function feeFees()
    {
        $this->fees = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remTrade()
    {
        $this->trade = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remShipping()
    {
        $this->shipping = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function remQuantity()
    {
        $this->quantity = [
            "show" => false,
            "amount" => 0,
        ];
    }

    public function updatedFees($value)
    {
        if ($value) {
            $this->amount = $this->$value;
        }
    }
    public function render()
    {
        return view('livewire.invoice.details');
    }

    public function customerTotal()
    {
        $amount = $this->amount - (int) $this->quantity_amount ?? 0 - (int) $this->trade_amount ?? 0 + (int) $this->shipping_amount ?? 0;

        if ($this->tax) {
            return $amount + (($amount / 100) * 19.5);
        }

        return $amount;
    }

    public function totals()
    {
        $amount = $this->amount - (int) $this->quantity_amount ?? 0 - (int) $this->trade_amount ?? 0 - (int) $this->fees_amount ?? 0 + (int) $this->shipping_amount ?? 0;

        if ($this->tax) {
            return $amount + (($amount / 100) * 19.5);
        }

        return $amount;
    }

    public function bill()
    {
        //get customer
        if ($customer = $this->company->customers()->whereId($this->customer_id)->first()) {
        } elseif ($this->existing == 'new') {
            $this->company->customers()->create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'country' => $this->country,
                "user_id" => auth()->id(),
            ]);
        } else {
            $customer = $this->customer_id;
        }

        DB::beginTransaction();

        //get total to pay


        if ($this->tax) {
            $total = ceil(($this->amount - ((int) $this->quantity_amount ?? 0) - ((int) $this->trade_amount ?? 0) + ((int)
            $this->shipping_amount ?? 0)) + (($this->amount - ((int) $this->quantity_amount ?? 0) - ((int)
            $this->trade_amount ?? 0) + ((int)
            $this->shipping_amount ?? 0)) / 100 * 19.25));
        } else {
            $total = ceil($this->amount - ((int) $this->quantity_amount ?? 0) - ((int) $this->trade_amount ?? 0) + ((int)
            $this->shipping_amount ?? 0));
        }

        if ($this->method == 'credit') {
            if (!$customer) {
                DB::rollback();
                return throw ValidationException::withMessages([
                    'method' => __("A customer must be selected")
                ]);
            }

            $customer->balance -= $total;
            $customer->save();
        }

        $this->order->status = "complete";
        $this->order->method = $this->method;

        $this->order->save();

        $this->order->bill()->create([
            'quantity_reduction' => $this->quantity_amount,
            'trade_reduction' => $this->trade_amount,
            'shipping' => $this->shipping_amount,
            'tax' => $this->tax,
            'total' => $total
        ]);

        DB::commit();

        $this->closeModal();
    }
}
