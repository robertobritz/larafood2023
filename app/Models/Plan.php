<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory; //não sei o que é
    protected $fillable = ['name', 'url', 'price', 'description'];

}
