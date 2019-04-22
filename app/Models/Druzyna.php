<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class druzyna extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='druzyny';
    protected $fillable = [
        'nazwa','kraj'
    ];


    public function stadion()
    {
        return $this->belongsTo(Stadion::class, 'stadiony_id');
    }
}
