<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Input;
use DB;
use Validator;
use App\Evento;
use App\Invitado;
use App\Usuario;
use App\Item;
use Mail;


class InvitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $email=$request['mail'];
        $users=Usuario::where('email','=',$email)->get();
        foreach ($users as $usuario ) 
        {
                \App\Invitado::create([
                    'idevento' =>$request['eventoid'],
                    'idusuario' =>$usuario->id,
                    'email' =>$request['mail'],
                    'rol' => '1',
                    'notificado'=> '1'
                ]);
        }
        $idevento=Input::get('eventoid');
        $evento=Evento::find($idevento);
        $organizador=Usuario::find($evento->creador);
        $data= [
            'nombre' => Input::get('nombreinvitado'),
            'evento' => $evento->nombre,
            'creador'=>$organizador->username
        ];
        $toEmail=Input::get('mail');
        Mail::send('emails.invitado', $data, function($msj) use ($toEmail)
        {                        
             $msj->subject('Invitacion a evento');
             $msj->to($toEmail);
        });
        return Redirect::back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         \App\Invitado::destroy($id);
          flash('Invitado eliminado exitosamente', 'success')->important();
          return Redirect::back();
    }
    public function reInvitar($IDevento)
    {//Reenviar invitación a no confirmados
        $invitados=Invitado::all();      
        $evento=Evento::find($IDevento);
        $organizador=Usuario::find($evento->creador);
        foreach ($invitados as $invitado ) 
        {
            if( $invitado->confirmado!=1)
            {
                $creador=Usuario::find($evento->creador);
                $data= [
                    'nombre' => Input::get('nombreinvitado'),
                    'evento' => $evento->nombre,
                    'creador'=>$organizador->username
                ];
                $toEmail=$invitado->email;
                Mail::send('emails.reinvitar', $data, function($msj) use ($toEmail)
                {                        
                     $msj->subject('Pedido de confirmación de asistencia');
                     $msj->to($toEmail);
                });
            }
        }
       // dd($IDevento);
         flash('Invitación enviada exitosamente a los invitados', 'success')->important();
       return Redirect::back();
    }
    public function reenviarInvitacion($IDinvitado, $IDevento)
    { //Reenviar invitación a invitado en particular
        $evento=Evento::find($IDevento);
        $invitado=Invitado::find($IDinvitado);
        $email=$invitado->email;
        $organizador=Usuario::find($evento->creador);
        $nombreInvi=Input::get('nombreinvitado');
        $data= [
            'nombre' => Input::get('nombreinvitado'),
            'evento' => $evento->nombre,
            'creador'=>$organizador->username
        ];
        Mail::send('emails.reinvitar', $data, function($msj) use ($email)
        {                        
            $msj->subject('Pedido de confirmación de asistencia');
            $msj->to($email);
        });
         flash('Invitación reenviada exitosamente.', 'success')->important();
        return Redirect::back();
    }
    public function enviarCuentas($IDevento)
   { 
        $evento=Evento::find($IDevento);
        $organizador=Usuario::find($evento->creador);
        $invitados=\App\Invitado::where('idevento',$IDevento)->get();
        foreach ($invitados as $invitado ) 
        {
            if( $invitado->confirmado==1)
            {
                $usuario=Usuario::find($invitado->idusuario);
                $data=[
                    'nombre'=>$usuario->username,
                    'evento' => $evento->nombre,
                    'creador'=>$organizador->username,
                    'costos'=>$invitado->costo,
                    'gastos'=>$invitado->gasto
                ];
                $email=$invitado->email;
                Mail::send('emails.emailCuentas', $data, function($msj) use ($email)
                {
                    $msj->subject('Envio de costos del evento');
                    $msj->to($email);
                });
            }
        }
         flash('Se enviaron las cuentas del evento a los asistentes', 'success')->important();
        return Redirect::back();
   }
   public function enviarCompras($IDevento)
   {        
        $evento=Evento::find($IDevento);
        $invitados=\App\Invitado::where('idevento',$IDevento)->get();
        $items=\App\Item::where('idevento',$IDevento)->get();//aca obtengo la lista de items para CADA evento
        $itemsOK=\App\Itemok::all();
        $creador=Usuario::find($evento->creador);
        $data= [
            'evento' => $evento->nombre,
            'creador'=>$creador->username,
            'invitados'=>$invitados,
            'items'=>$items,
            'itemsOK'=>$itemsOK
        ];
         foreach ($invitados as $invitado ) 
        {
            $toEmail=$invitado->email;
            Mail::send('emails.emailCompras', $data, function($msj) use ($toEmail)
            {                        
                $msj->subject('Lista de compras');
                $msj->to($toEmail);
            });
        }
         flash('Se envió la lista de compras a los invitados.', 'success')->important();
        return Redirect::back();
   }
}