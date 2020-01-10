<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        return ($this->image) ? '/storage/' . $this->image : "/storage/profile/da4ZFVmzui89CBf54vqfqBH9njrIVlDA2acn5eQA.jpeg";
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
