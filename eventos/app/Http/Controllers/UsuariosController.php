<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Validator;
use App\Usuario;


class UsuariosController extends Controller
{
        public function login(){
            return view('login');
   	    }
		public function post_login(){
			$input = Input::all();
			$rules = [
				'Email' => 'required|exists:usuarios,Email',
				'password' => 'required',
			];
			$validator = Validator::make($input, $rules);
			if ($validator->fails()) {
					return redirect()->back()->withErrors($validator);
			}
			else
			{
				$email = input::Get('Email');
				$password = input::Get('password');
				$usuario = DB::Table('usuarios')->where('email', $email)->first();
				if ($usuario->password==$password) {
					
                    return view('misEventos');
				}
				else
				{
					return redirect()->back();
				}
			}
	    }

	     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
             return view('registro');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
            /*$user= new Usuario($request->all);
        	$user->save();
            dd($request->all());*/
            //$user= new User($request->all());
            \App\Usuario::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['pass']),
                'apellido' => $request['apellido'],
                'sexo' => $request['sexo'],
                'provincia' => $request['provincia'],
                'ciudad' => $request['ciudad'],

            ]);
            return view('login');
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }	
}
