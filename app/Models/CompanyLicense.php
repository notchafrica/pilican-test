<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyLicense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function scopeIsActive()
    {
        return !$this->expired_at || $this->expired_at > now();
    }
}
