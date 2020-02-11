<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable=['nombre', 'apellidos', 'mail', 'logo'];

    public function modulos()
    {
        return $this->belongsToMany('App\Modulo')->withPivot('nota')->withTimestamps();
    }
}
