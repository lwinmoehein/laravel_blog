<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','account_name', 'email', 'password',
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
    function questions(){
        return $this->hasMany(Question::class);
    }
    function answers(){
        return $this->hasMany(Answer::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    function votes(){
        return $this->hasMany(Vote::class);
    }
    function achievements(){
        return $this->belongsToMany(Achievement::class,'achievement_user');
    }

    function badges(){
        return $this->belongsToMany(Badge::class,'badge_user');
    }


    public function getRouteKeyName()
    {
        return 'account_name';
    }
}
