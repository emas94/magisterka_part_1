<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class liga extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table ='ligi';
    protected $fillable = [
        'nazwa','kraj'
    ];
    public function druzyny()
    {
        return $this->belongsTo(Stadion::class,'stadiony_id');
        return $this->belongsTo(Mecz::class,'mecze_id');
        return $this->belongsTo(Druzyna::class,'druzyny_id');
    }
}
