<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->reference = self::reference();
        });
    }

    private static function reference()
    {
        $i = Str::random(12);
        if (self::whereReference($i)->exists()) {
            return self::reference();
        }
        return $i;
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function services()
    {
        return $this->hasMany(OrderService::class);
    }

    public function bill()
    {
        return $this->hasOne(Billing::class);
    }
}
