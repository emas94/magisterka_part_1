<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class News extends Model
{



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'news';
    protected $fillable = [
        'tittle','author','content','create_at','id'
    ];

    public  function news()
    {
        return $this->belongsToMany(User::class,'user_news' );
    }
}
