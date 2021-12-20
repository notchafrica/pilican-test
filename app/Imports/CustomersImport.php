<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Lawyer\Rules\CountryCode;

class CustomersImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithValidation
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $company = auth()->user()->company;
        return new Customer([
            'name'     => $row['name'],
            'phone'    => $row['phone'],
            'email'    => $row['email'],
            'city'    => $row['city'],
            'country'    => $row['country'],
            'address'    => $row['address'],
            'company_id'    => $company->id,
            'user_id'    => auth()->id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'phone:CM,AUTO',
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'country' => [
                'nullable',
                new CountryCode(),
            ],
        ];
    }
}
