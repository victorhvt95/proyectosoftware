<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyecto extends Model
{
    protected $table='proyecto';
    protected $primaryKey='id';
    protected $fillable=[
      'nombre','clave','xml','estado'
    ];
    public $timestamps=false;

    public function usuarios(){
        $usuarios=$this->belongsToMany('App\User',
            'proyecto_usuario','proyecto_id',
            'usuario_id')->withPivot('cargo','estado');
    }
}
