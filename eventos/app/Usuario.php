<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
     protected $table = 'usuarios';

     protected $fillable = ['username', 'apellido', 'password', 'sexo', 'email', 'provincia', 'ciudad'];

     protected $hidden = ['password', 'remember_token'];
}
