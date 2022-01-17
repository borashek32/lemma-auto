<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use Commentable;
    use HasTags;

    protected $fillable = [
        'title',
        'page_text',
        'img',
        'category_id',
        'slug',
        'link'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function mailings()
    {
        return $this->hasMany(Mailing::class);
    }
}
