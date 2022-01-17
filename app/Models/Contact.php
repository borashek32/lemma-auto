<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'map',
        'time',
        'desc'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
