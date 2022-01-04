<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchase_products');
    }

    public function sales()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
