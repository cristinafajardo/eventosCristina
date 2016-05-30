<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DescripcionesController extends Controller
{

   public function index(){
        return view('index');
   }
 
   public function que(){
        return view('que');
   }

   public function quienes(){
        return view('quienes');
   }

   public function contacto(){
        return view('contacto');
   }
}