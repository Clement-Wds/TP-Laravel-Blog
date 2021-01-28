<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class)->latest();
    }

    //Récupérer tous les abonnements
    public function followings(){
        return $this->belongsToMany(User::class, 'followings', 'follower_id', 'following_id');
    }

    //Récupérer les abonnés
    public function followers(){
        return $this->belongsToMany(User::class, 'followings', 'following_id', 'follower_id');
    }

    //Récupérer les abonnements et vérifier que ces utilisateurs existent (en cas de suppresion de compte)
    public function follow($user){
        return $this->followings()->where('following_id', $user->id)->exist();
    }
}
