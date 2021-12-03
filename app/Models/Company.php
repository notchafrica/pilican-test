<?php

namespace App\Models;

use App\Traits\HasTransactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    use HasTransactions;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->code = self::code();
        });
    }

    private static function code()
    {
        $i = Str::random(8);
        if (self::whereCode($i)->exists()) {
            return self::code();
        }
        return $i;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
