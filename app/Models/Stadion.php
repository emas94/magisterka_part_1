<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadion extends Model
{



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'stadiony';
    protected $fillable = [
        'nazwa','adres','liczbamiejsc'
    ];

}
