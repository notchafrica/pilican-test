<?php

namespace App\Http\Livewire\Sale;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $inputs = [];
    public $inputs_s = [];
    public $i = 1;
    public $j = 1;
    public $product, $quantity, $squantity, $service, $price, $sprice, $name, $phone, $email, $customer_id;
    public $company;
    public $country;
    public $amount;
    public $reason;
    public $method = "cash";
    public $existing = 'inconito';

    public function mount()
    {
        $this->company = auth()->user()->company;
    }

    public function save()
    {
        $this->validate([

            'product.*' => [
                'required', Rule::exists('products', 'id')->where(function ($query) {
                    $query->whereCompanyId($this->company->id);
                }),
            ],
            'quantity.*' => ['required', 'numeric'],
            'price.*' => ['required', 'numeric'],
            'service.*' => [
                'required', Rule::exists('services', 'id')->where(function ($query) {
                    $query->whereCompanyId($this->company->id);
                }),
            ],
            'squantity.*' => ['required', 'numeric'],
            'sprice.*' => ['required', 'numeric'],
        ]);

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

        //get amount
        $amount = 0;

        //create order
        $order = $this->company->orders()->create([
            'user_id' => auth()->id(),
            'customer_id' => $customer?->id,
            'currency' => 'xaf',
            'method' => $this->method,
            'status' => 'pending',
        ]);

        if ($this->product) {
            foreach ($this->product as $key => $value) {
                $product = Product::find($this->product[$key]);
                $amount = $amount + ($product->price * $this->quantity[$key]);
                $order->products()->create([
                    'product_id' => $product->id,
                    'quantity' => $this->quantity[$key],
                ]);
            }
        }

        if ($this->service) {
            foreach ($this->service as $key => $value) {
                $product = Service::find($this->service[$key]);
                $amount = $amount + ($product->price * $this->quantity[$key]);
                $order->services()->create([
                    'service_id' => $product->id,
                    'quantity' => $this->squantity[$key],
                ]);
            }
        }



        $order->amount = $amount;
        $order->save();

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.sale.create');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i, $type = "product")
    {
        $i = $i + 1;

        if ($type == 'product') {
            $this->i = $i;
            array_push($this->inputs, $i);
        } else {
            $this->j = $i;
            array_push($this->inputs_s, $i);
        }
    }

    /**


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i, $type = 'product')
    {
        if ($type == 'product')
            unset($this->inputs[$i]);
        else
            unset($this->inputs_s[$i]);
    }
}
