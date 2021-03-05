<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autopart extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'delivery_time',
        'price'
    ];
}
