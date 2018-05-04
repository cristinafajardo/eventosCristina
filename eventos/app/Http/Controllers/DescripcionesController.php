<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DescripcionesController extends Controller
{
   public function index()//muestra index
   {
        return view('index');
   }
   public function que()//muestra que es eventos...
   { 
        return view('que');
   }
   public function quienes()// muestra quienes somos...
   {
        return view('quienes');
   }
   public function contacto()//muestra form de contacto
   {
        return view('contacto');
   }
 
}