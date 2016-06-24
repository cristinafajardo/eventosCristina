<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Validator;

class RegistroController extends Controller
{
  /* public function registro(){
        return view('registro');
   }
   public function post_registro(){
			$input= Input::all();
			$rules = [
			'username' => 'required|min:2|max:10',
			'apellido'=>'required|min:3|max:10',
			'email' => 'required|email|unique:usuarios,email',
			'password' => 'required|min:4|max:10',
			'nacimiento'=>'required',
			'confpass'=>'same:password',
			'ciudad'=>'required'			
		];
			
		$validator = Validator::make ($input, $rules); 
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator);		
		}
		else
		{ 
			if ($_POST)
			{
				$Usuario = new Usuarios;
				$Usuario -> username = Input::get('username');
				$Usuario -> apellido =Input::get('apellido');
				$Usuario -> ciudad = Input::get('ciudad');
				$Usuario -> email = Input::get('email');
				$Usuario -> nacimiento = Input::get('nacimiento');
				$Usuario -> password = Input::get('password');
				$Usuario -> provincia = Input::get('provincias');
				$Usuario -> sexo = Input::get('sexo');
				$Usuario->save();
				return Redirect::action('UsuarioController@login');
				//return Redirect::to('/registro')->with('registro', 'Registro completado. Accede a su cuenta');	
			}
			else
			{
				return Redirect::back();
			}		
		}
	}*/
}