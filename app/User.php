<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function articles(){
        return $this->hasMany(Article::class);
    }
    function replies(){
        return $this->hasMany(Reply::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    function votes(){
        return $this->hasMany(Vote::class);
    }
    function achievements(){
        return $this->belongsToMany(Achievement::class);
    }

    function badges(){
        return $this->belongsToMany(Badge::class);
    }
}
