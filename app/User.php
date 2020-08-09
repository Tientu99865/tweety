<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    //get avatar
    public function getAvatarAttribute($value){
        return asset($value);
    }

    //show timeline
    public function timeline(){
        //include all of the user's tweets
        // as well as the tweets of everyone
        //they follow .. in descending order by date

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id',$friends)
            ->orWhere('user_id',$this->id)
            ->latest()->get();
    }

    //show user's tweets
    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    //create relatetionship
    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function following(User $user){
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    //show following
    public function follows(){
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

//    public function getRouteKeyName()
//    {
//        return  'name';
//    }

    public function path($append = ''){
        $path = route('profiles',$this->username);

        return $append ? "{$path}/{$append}" : $path;
    }


}
