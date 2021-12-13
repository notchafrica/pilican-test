<?php

namespace App\Models;

use App\Traits\HasTransactions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasTransactions;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->username = self::username();
        });
    }

    private static function username()
    {
        $i = Str::random(8);
        if (self::whereUsername($i)->exists()) {
            return self::username();
        }
        return $i;
    }

    public function company()
    {
        if (!$this->profile()->exists())
            return $this->belongsTo(Company::class);
        return $this->profile();
    }
    public function profile()
    {
        return $this->hasOne(Company::class);
    }
}
