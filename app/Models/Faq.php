<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'question',
        'answer',
        'slug'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }
}
