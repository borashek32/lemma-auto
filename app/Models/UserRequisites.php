<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequisites extends Model
{
    use HasFactory;

    protected $table = 'user_requisites';

    protected $fillable = [
        'user_id',
        'original_filename',
        'path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
