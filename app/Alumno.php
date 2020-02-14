<?php

namespace App;
use App\Modulo;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable=['nombre', 'apellidos', 'mail', 'logo'];

    public function modulos()
    {
        return $this->belongsToMany('App\Modulo')->withPivot('nota')->withTimestamps();
    }

    public function modulosOut(){
        //Esto me devuelve los ID de los módulos que tiene ese alumno
        $modulos1=$this->modulos()->pluck('modulos.id');
        //Esto me devuelve los modulos que le faltan al alumno
        $modulos2=Modulo::whereNotIn('id', $modulos1)->get();
        return $modulos2;
    }
}
