<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    protected $table = 'invitados';

     protected $fillable = ['idevento', 'idusuario', 'email', 'rol', 'menores', 
     						'adultos', 'confirmado', 'notificado', 'costo', 'gasto', 
     						'balance'
     					   ];
}
