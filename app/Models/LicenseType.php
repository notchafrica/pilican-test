<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenseType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql2';

    protected $guarded = ['id'];
    protected $hidden = ['id'];
}
