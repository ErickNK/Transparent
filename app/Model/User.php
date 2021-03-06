<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //RELATIONSHIPS

    //review
    public function review(){
        return $this->hasOne('App\Model\Review','userId');
    }

    //comments
    public function comments(){
        return $this->hasMany('App\Model\Comment','userId');
    }

    //topics
    public function topics(){
        return $this->hasMany('App\Model\Topic','userId');
    }

    //user
    public function joinedTopics(){
        return $this->belongsToMany('App\Model\Topic','topic_joined_users','userId','topicId');
    }

    //blogs
    public function blogs(){
        return $this->hasMany('App\Model\Blog','userId');
    }

    //documents
    public function documents(){
        return $this->hasMany('App\Model\Document','userId');
    }

    //picture
    public function pictures(){
        return $this->morphMany('App\Model\Picture','pic');
    }
}
