<?php

namespace App\Http\Livewire\License;

use App\Models\CompanyLicense;
use App\Models\Customer;
use App\Models\License;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Validate extends Component
{
    public $error = "";
    public $key = "";

    public function mount()
    {
        $this->key = auth()->user()->company->license?->key ?: null;
    }
    public function render()
    {
        return view('livewire.license.validate')->extends('layouts.auth');
    }

    public function activate()
    {
        $this->validate([
            'key' => ['required']
        ]);

        $this->error = "";


        //get license

        $license = License::with(['licenseType', 'company'])->where('key', $this->key)->first();

        if (!$license) {
            $this->error = "Invalid license key";
        } else {
            if (!$license->company || $license->company->company_id == auth()->user()->company->id) {
                dd($license);
                if ($license->company) {
                    $license->company()->update([
                        'company_id' => auth()->user()->company->id,
                    ]);
                } else {
                    $license->company()->create([
                        'company_id' => auth()->user()->company->id,
                    ]);
                }

                return redirect()->route('home');
            } else {
                $this->error = "You already have a license";
            }
        }



        /* $response = Http::acceptJson()->get('http://' . env('LICENSE_DOMAIN') . '/' . $this->key);

        if ($response->successful()) {
            $this->error = "error";
        }

        $r = json_decode($response->body(), true);

        $company = auth()->user()->company;

        if (!isset($r['company']) || !(isset($r['company']) && isset($r['company']['code']) && $r['company']['code'] != $company->code)) {

            $response = Http::post('http://' . env('LICENSE_DOMAIN') . '/' . $this->key . '/' . $company->code);

            if ($response->successful()) {

                $license = $company->license;

                if (!$license) {
                    CompanyLicense::create([
                        'key' => $r['key'],
                        'status' => $r['status'],
                        'name' => $r['license_type']['name'],
                        'expired_at' => $r['expired_at'],
                        'notification' => $r['license_type']['notification'],
                        'cloud' => $r['license_type']['cloud'],
                        'desk' => $r['license_type']['desk'],
                        'company_id' => auth()->user()->company->id
                    ]);
                } else {
                    $license->update([
                        'key' => $r['key'],
                        'status' => $r['status'],
                        'name' => $r['license_type']['name'],
                        'expired_at' => $r['expired_at'],
                        'notification' => $r['license_type']['notification'],
                        'cloud' => $r['license_type']['cloud'],
                        'desk' => $r['license_type']['desk'],
                    ]);
                }
                return redirect()->route('home');
            } else {
                $this->error = "error";
            }





            // store registration on remote
        } else {
            $this->error = "error";
        } */
    }
}
