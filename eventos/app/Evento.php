<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
 	 protected $table = 'eventos';

     protected $fillable = ['nombre', 'direccion', 'fecha', 'hora', 'descripcion', 
     						'latitud', 'longitud', 'cerrado', 'metodocuenta', 'menoresmax', 
     						'adultosmax', 'creador'
     					   ];

    // protected $hidden = ['password', 'remember_token'];
}
