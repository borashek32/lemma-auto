<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'taggables';

    protected $fillable = [
        'tag_id',
        'taggable_type',
        'taggable_id'
    ];
}
