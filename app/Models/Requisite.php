<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisite extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'legal_address',
        'real_address',
        'inn_kpp',
        'r_s',
        'k_s',
        'bik'
    ];
}
