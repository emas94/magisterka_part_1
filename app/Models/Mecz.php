<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mecz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='mecze';
    protected $fillable = [
        'nazwa','kliend_id','data','wolnemiejsca','status','organizatorzy_id'
    ];
    public function organizatorzyMecz()
    {
        return $this->belongsToMany(User::class, 'organizator_mecz');
    }
    public function klientMecz()
    {
        return $this->belongsToMany(User::class, 'klient_mecz');
    }

}
