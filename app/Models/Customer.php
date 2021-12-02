<?php

namespace App\Models;

use App\Traits\HasTransactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Rackbeat\UIAvatars\HasAvatar;

class Customer extends Model
{
    use HasFactory;
    use HasAvatar;
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
}
