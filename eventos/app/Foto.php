<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Foto extends Model
{
    protected $table = 'fotos';

     protected $fillable = ['idevento', 'titulo', 'photo'];
 
     /*public function setPhotoAttribute($photo){
     	this->attributes['photo'] = Carbon::now()->second.$photo->getClientOriginalName();
     	$titulo= Carbon::now()->second.$photo->getClientOriginalName();
     	\Storage::disk('local')->put($titulo, \file::get($photo));
     }*/
}
