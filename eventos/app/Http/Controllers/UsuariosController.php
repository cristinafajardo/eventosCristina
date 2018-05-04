<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Validator;
use App\Usuario;


class UsuariosController extends Controller
{
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
        public function create() //muestra vista para registarse
        {
             return view('registro');
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request) //inserto usuario en bd, a traves de "registro"
        {
            \App\Usuario::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => $request['pass'],
                'apellido' => $request['apellido'],
                'sexo' => $request['sexo'],
                'provincia' => $request['provincia'],
                'ciudad' => $request['ciudad'],
                'nacimiento' => $request['fecha'],
            ]); 
            $toEmail=Input::get('email');
            Mail::send('emails.registrado', $request->all(), function($msj) use ($toEmail)
            {
                $msj->subject('Correo de registro');
                $msj->to($toEmail);
            });
            return redirect('conf_reg');
        }
        public function login(){ //muestra la vista de login
              return view('login');
        }
        public function post_login()
        { //comprueba que exista el usuario y redirecciona a "miseventos" si esta ok.
              $input = Input::all();
              $rules = [
                'Email' => 'required|exists:usuarios,Email',
                'password' => 'required',
               ];
              $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator);
            }
            else
            {
                $email = input::Get('Email');
                $password = input::Get('password');
                $usuario = DB::Table('usuarios')->where('email', $email)->first();
                if($usuario) 
                {
                   if ($usuario->password == $password)
                   {
                       Session::put('usuario_id', $usuario->id);
                       Session::put('usuario_username', $usuario->username);
                       Session::put('usuario_email', $usuario->email); 
                       Session::put('usuario_pcia', $usuario->provincia);
                       Session::put('usuario_city', $usuario->ciudad);
                      /*$registrados = \App\Usuario::all();
                       $eventosCreados = \App\Evento::paginate(6);
                       return view('misEventos',array('eventosCreados'=>$eventosCreados,'registrados'=>$registrados));*/
                       return Redirect::action('EventosController@index');
                   }
                   else
                   {
                       return view('/login');
                   }
                }
                else
                {
                   return view('/login');
                }
            }
        }
        public function logout()
        {
           Session::flush();
           return redirect::to('/');
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
          public function verPerfil($id) //muestra vista con datos del perfil creado en registrarme
        {
            $usuario=\App\Usuario::find($id);
            return view('perfil',['usuario'=>$usuario]);
        }
         public function perfil() //muestra vista con datos del perfil creado en registrarme
        {  
            $id=Session::get('usuario_id');
            $usuario=\App\Usuario::find($id);
            return view('perfil',['usuario'=>$usuario]);
        }
        public function edit($id)
        {
           $usuario=\App\Usuario::find($id);
           return view('editarPerfil',['usuario'=>$usuario]);
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
            $usuario=\App\Usuario::find($id);
            $usuario->username = $request['username'];
            $usuario->email = $request['email'];
            $usuario->password = $request['pass'];
            $usuario->apellido = $request['apellido'];
            $usuario->sexo = $request['sexo'];
            $usuario->provincia = $request['provincia'];
            $usuario->ciudad= $request['ciudad'];
            $usuario->nacimiento = $request['fecha'];
            $usuario->save();
            return Redirect::action('UsuariosController@perfil');
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
      
        public function conf_reg() //muestra vista de confirmacion de registro
        {
            return view('conf_reg');
        }
       
}