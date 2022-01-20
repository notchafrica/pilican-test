<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class ProductsImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithValidation
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
        return new Product([
            'name'     => $row['designation'],
            'quantity'    => $row['qte'],
            'price'    => $row['prix'],
            'company_id'    => $company->id,
            'user_id'    => auth()->id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'designation' => [
                'required',
                'string',
            ],
            'qte' => [
                'required',
                'numeric',
            ],
            'prix' => [
                'nullable',
                'numeric',
            ],
        ];
    }
}
