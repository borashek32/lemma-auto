<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Commenter;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'provider_id',
        'avatar',
        'status_id',
        'margin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function requisites()
    {
        return $this->hasOne(UserRequisites::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function mailings()
    {
        return $this->hasMany(Mailing::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

//    public function comments()
//    {
//        return $this->morphMany(Config::get('comments.model'), 'commenter');
//    }

    public function approvedComments()
    {
        return $this->morphMany(Config::get('comments.model'), 'commenter')->where('approved', true);
    }

    protected function address()
    {
        return $this->hasOne(Address::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
