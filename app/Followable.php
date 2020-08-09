<?php


namespace App;


trait Followable
{
//create relatetionship

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function following()
    {

    }

    //show following
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function toggleFollow(User $user){
        $this->follows()->toggle($user);

    }
}
