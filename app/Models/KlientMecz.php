<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlientMecz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'klient_mecz';
    protected $fillable = [
        'user_id', 'mecz_id',
    ];

    public function wyjazdyList()
    {
        return $this->belongsToMany(Mecz::class,'klient_mecz');
    }

}
