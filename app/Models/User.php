<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name','login', 'email', 'password','lastname','telefon', 'status', 'funckcja'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded=[];

    public function organizatorMecze()
    {
        return $this->hasMany(Mecz::class, 'organizatorzy_id');
    }
    public  function mecze()
    {
        return $this->belongsToMany(Mecz::class,'organizator_mecz' );
    }
    public function wyjazdyList()
    {
        return $this->belongsToMany(Mecz::class,'klient_mecz');
    }
    public  function news()
    {
        return $this->belongsToMany(News::class,'user_news' );
    }
}
