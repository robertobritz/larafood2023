<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $table = ' clients';

    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];
}
