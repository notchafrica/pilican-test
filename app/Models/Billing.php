<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function order()
    {
        return $this->belongTo(Order::class);
    }
}
