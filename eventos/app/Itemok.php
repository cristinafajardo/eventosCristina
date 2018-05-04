<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemok extends Model
{
    protected $table = 'itemsoks';

     protected $fillable = ['iditem', 'cantidad', 'idusuario'];
}
