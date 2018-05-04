<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Validator;
use App\Usuario;
use App\Evento;
use App\Item;
use App\Itemok;
use App\Invitado;
use App\Foto;


class EventosController extends Controller
{
    /**$miseventos = \App\Evento::paginate(5);
        return view('misEventos',compact('miseventos'));

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventosCreados = \App\Evento::paginate(10);//guardo en $eventosCreados todas las filas de la tabla eventos
        $registrados = \App\Usuario::all(); //guardo en $registrados todos los usuarios registrados
        $invitados = \App\Invitado::all();
        return View('misEventos',array('eventosCreados'=>$eventosCreados,'registrados'=>$registrados, 'invitados'=>$invitados)); //devuelve la vista de MisEventos con el valor 'lista de eventos'
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       \App\Evento::create([
          'nombre' => $request['nombre'],
          'direccion' => $request['lugar'],
          'fecha' =>$request['fecha'],
          'hora' => $request['hora'],
          'descripcion' => $request['descripcion'],
          'latitud' => $request['lat'],
          'longitud' =>$request['long'],
          //'cerrado' => $request['ciudad'],
          //'metodocuenta' => $request['ciudad'],
          'niños_organizador' => $request['menores'],
          'adultos_organizador' => $request['mayores'],
          'creador' => session('usuario_id'),
        ]);
        return Redirect::action('EventosController@index');
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
    public function edit($id)//aca tendria que filtrar las tablas y enviarlas filtradas
    {   
        $idevento=$id;
        $evento=\App\Evento::find($id);//aca ya tengo el evento en si, completo. con nombre de creador e id
        $invitados=\App\Invitado::where('idevento',$idevento)->get();
        $items=\App\Item::where('idevento',$idevento)->get();//aca obtengo la lista de items para CADA evento
        $fotos=\App\Foto::where('idevento',$idevento)->get();
        $itemsOK=\App\Itemok::all();
        return view('includes.eventos.editarEvento', array('evento'=>$evento, 'items'=>$items, 'invitados'=>$invitados, 'fotos'=>$fotos,'itemsOK'=>$itemsOK));
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
        $evento=\App\Evento::find($id);
        $evento->nombre = $request['nombre'];
        $evento->direccion = $request['lugar'];
        $evento->fecha = $request['fecha'];
        $evento->hora = $request['hora'];
        $evento->descripcion = $request['descripcion'];
        $evento->latitud = $request['latitud'];
        $evento->longitud =$request['longitud'];
       /* $evento->cerrado = $request['ciudad'];
        $evento->metodocuenta = $request['rbCuentas'];
        */
        $evento->niños_organizador = $request['menores'];
        $evento->adultos_organizador = $request['mayores'];
        $evento->creador = session('usuario_id');
        $evento->save();
         // return Redirect::action('EventosController@index');
        return Redirect::back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Evento::destroy($id);
        flash('Evento eliminado', 'success')->important();
        return Redirect::to('misEventos');
    }
    public function confirmarAsistencia(Request $request)
    {
        $eventoId= $request['evid'];
        $voy=Input::get('ir');
        $invitadoID = session('usuario_id');
        $adultos=Input::get('adultos');
        $niños=Input::get('niños');
        $listaInvitados= Invitado::where('idevento','=',$eventoId)->where('idusuario','=',$invitadoID)->get();
        //dd($eventoId, $voy, $invitadoID, $adultos, $niños, $listaInvitados);
        if($voy=='si')
        {
            foreach ($listaInvitados as $usuario) 
            {
                $invitado = Invitado::find($usuario->id);
                $invitado->confirmado=1;
                $invitado->menores=$niños;
                $invitado->adultos=$adultos;
                $invitado->save();
            }
             return Redirect::back();
        }
        if($voy=='no')
        {
            foreach ($listaInvitados as $usuario)  
            {
                $invitado = Invitado::find($usuario->id);
                $invitado->confirmado=2;
                $invitado->save();
            }
            return Redirect::back();
        }
        if($voy=="nose")
        {
            foreach ($listaInvitados as $usuario) 
            {
                $invitado = Invitado::find($usuario->id);
                $invitado->confirmado=0;
                $invitado->save();
            }
             return Redirect::back();
        }
    }
    public function rendirGastos(Request $request, $id)
    {
       $invitadoID = session('usuario_id');
       $eventoId= $request['evid'];
       $listaInvitados= Invitado::where('idevento','=',$eventoId)->where('idusuario','=',$invitadoID)->get();
       $gasto=Input::get('gastado');
       foreach ($listaInvitados as $usuario) 
       {
          $user = Invitado::find($usuario->id);
          $user->gasto=$gasto;
          $user->save();
       }
       return Redirect::back();
    }
     public function gastosOrganizador(Request $request, $id)
    {
       $invitadoID = session('usuario_id');
       $eventoId= $request['evid'];
       $gasto=Input::get('gastado');

          $evento = Evento::find($eventoId);
          $evento->gastos_organizador=$gasto;
          $evento->save();
       
       return Redirect::back();
    }
    public function cuentas(Request $request)
    {
        $metodo=$request['opcion'];
        $eventoID=$request['eventoid'];
        $evento=\App\Evento::find($eventoID);
        $listInvitados=Invitado::where('idevento','=',$eventoID)->where('confirmado','=','1')->get();
        $niñosOrganizador=$evento->niños_organizador;
        $adultosOrganizador=$evento->adultos_organizador;
        $gastosOrganizador=$evento->gastos_organizador;
        //dd($niñosOrganizador,$adultosOrganizador);
        // dd($listInvitados);
       if($metodo=='1') //EL ORGANIZAOR INVITA
       {
            $balance=0;
            foreach($listInvitados as $usuario)
            {
                $invitado = Invitado::find($usuario->id);
                $invitado->costo=0;
                $invitado->balance=($invitado->costo)-($usuario->gasto);
                $invitado->save();
            }
            $evento->metodocuenta = 1;
            $evento->costo_organizador=$evento->gastos_organizador;
            $evento->balance_organizador=0;
            $evento->save();
            return Redirect::back();
       }
       if($metodo=='2')//Se establece un valor fijo PARA CADA INITADO
       {
            $valor=$request['valor'];
            foreach($listInvitados as $usuario)
            {
                $invitado = Invitado::find($usuario->id);
                if($invitado->confirmado=='1')
                {
                    $invitado->costo=$valor*($invitado->adultos+$invitado->menores);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);
                    $invitado->save();
                }
            }
            $evento->costo_organizador=$valor*($evento->adultos_organizador+$evento->niños_organizador);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 2;
            $evento->save();
            return Redirect::back();
       }
        if($metodo=='3')//Valor fijo diferenciado segun Adulto-Niño
        {
            $valorAdulto=$request['valorAdulto'];
            $valorNiño=$request['valorNiño'];
            foreach($listInvitados as $usuario)
            {
                $invitado = Invitado::find($usuario->id);
                if($invitado->confirmado=='1')
                {
                    $invitado->costo=(($usuario->adultos)*$valorAdulto)+(($usuario->menores)*$valorNiño);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);
                    $invitado->save();
                }
            }
            $evento->costo_organizador=(($evento->adultos_organizador)*$valorAdulto)+(($evento->niños_organizador)*$valorNiño);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 3;
            $evento->save();
            return Redirect::back();
        }
        if($metodo=='4')//Se divide lo gastado en partes iguales
        {
            $gastosAll=0;
            $cantAdultos=0;
            $cantNiños=0;
            $totalGente=0;
            $costo=0;
            foreach($listInvitados as $usuario)
            {
                $gastosAll=$gastosAll+($usuario->gasto);
                $cantAdultos=$cantAdultos+$usuario->adultos;
                $cantNiños= $cantNiños+$usuario->menores;
            }
            $totalGente=$cantAdultos+$cantNiños+$niñosOrganizador+$adultosOrganizador;
            $costo=round(($gastosAll+$gastosOrganizador)/$totalGente);
            foreach ($listInvitados as $usuario ) 
            {
                $invitado = Invitado::find($usuario->id);
                 if($invitado->confirmado=='1')
                {
                    $invitado->costo=$costo*($invitado->adultos+$invitado->menores);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);
                    $invitado->save();
                }
            }
            $evento->costo_organizador=$costo*($evento->adultos_organizador+$evento->niños_organizador);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 4;
            $evento->save();
            return Redirect::back();
        }
        if($metodo=='5') //Se divide lo gastado segun asistentes
        {
            $gastosAll=0;
            $cantAdultos=0;
            $cantNiños=0;
            $totalGente=0;
            $gastoTotal=0;
            $porcentajeAdultos=0;
            $porcentajeAdultos=$request['porcentajeAdulto'];
            $porcentajeNiños=0;
            $porcentajeNiños=$request['porcentajeNiño'];
            $gastoAdultos=0;
            $gastoNiños=0;
            $gastoPorAdulto=0;
            $gastoPorNiño=0;
            foreach($listInvitados as $usuario)//aca calcculo gasto total
            {
                $gastosAll=$gastosAll+($usuario->gasto);
                $cantAdultos=$cantAdultos+$usuario->adultos;
                $cantNiños= $cantNiños+$usuario->menores;
            }
            $gastoTotal=($gastosAll+$gastosOrganizador);
            /////////////////////////////////////////////////////////
            $cantAdultos=$cantAdultos+$adultosOrganizador;
            $cantNiños=$cantNiños+$niñosOrganizador;
            //$totalGente=$cantAdultos+$cantNiños;
                       
            $gastoAdultos=round(($porcentajeAdultos*$gastoTotal)/100);
            $gastoNiños=round(($porcentajeNiños*$gastoTotal)/100); //$gastoTotal-$gastoAdultos;

            $gastoPorAdulto=round($gastoAdultos/$cantAdultos);
            $gastoPorNiño=round($gastoNiños/$cantNiños);
            
            foreach ($listInvitados as $usuario ) 
            {
                $invitado = Invitado::find($usuario->id);
                 if($invitado->confirmado=='1')
                {
                    $invitado->costo=(($usuario->adultos)*$gastoPorAdulto)+(($usuario->menores)*$gastoPorNiño);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);
                    $invitado->save();
                }
            }
            $evento->costo_organizador=(($evento->adultos_organizador)*$gastoPorAdulto)+(($evento->niños_organizador)*$gastoPorNiño);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 5;
            $evento->save();
            return Redirect::back();
        }
        
        if($metodo=='6')//Se divide un valor arbitrario en partes iguales
        {   
            $valorArbitrario=$request['valor'];
            $cantAdultos=0;
            $cantNiños=0;
            $costo=0;
            $totalGente=0;
            foreach ($listInvitados as $usuario)
            {
                $cantAdultos=$cantAdultos+$usuario->adultos;
                $cantNiños= $cantNiños+$usuario->menores;
            }
            $totalGente=$cantAdultos+$cantNiños+$niñosOrganizador+$adultosOrganizador;
            if ($totalGente!=0)
            {
                $costo=round($valorArbitrario/$totalGente);
            }
            foreach ($listInvitados as $usuario) 
            {
                $invitado = Invitado::find($usuario->id);
                if($invitado->confirmado=='1')
                {
                    $invitado->costo=$costo*($invitado->adultos+$invitado->menores);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);                
                    $invitado->save();
                }
            }
            $evento->costo_organizador=$costo*($evento->adultos_organizador+$evento->niños_organizador);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 6;
            $evento->save();
            return Redirect::back();
        }
        if($metodo=='7') //Se divide un valor arbitrario segun asistentes
        {
            
            $cantAdultos=0;
            $cantNiños=0;
                       
            $porcentajeAdultos=0;
            $porcentajeAdultos=$request['porcentajeAdulto'];
            $porcentajeNiños=0;
            $porcentajeNiños=$request['porcentajeNiño'];
            $valorArbitrario=0;
            $valorArbitrario=$request['costoArbitrario'];
            $gastoAdultos=0;
            $gastoNiños=0;
            $gastoPorAdulto=0;
            $gastoPorNiño=0;
            foreach($listInvitados as $usuario)//aca calcculo total invitados
            {
                $cantAdultos=$cantAdultos+$usuario->adultos;
                $cantNiños= $cantNiños+$usuario->menores;
            }
            /////////////////////////////////////////////////////////
            $cantAdultos=$cantAdultos+$adultosOrganizador;
            $cantNiños=$cantNiños+$niñosOrganizador;
                                  
            $gastoAdultos=round(($porcentajeAdultos*$valorArbitrario)/100);
            $gastoNiños=round(($porcentajeNiños*$valorArbitrario)/100); //$gastoTotal-$gastoAdultos;

            $gastoPorAdulto=round($gastoAdultos/$cantAdultos);
            $gastoPorNiño=round($gastoNiños/$cantNiños);
            
            foreach ($listInvitados as $usuario ) 
            {
                $invitado = Invitado::find($usuario->id);
                 if($invitado->confirmado=='1')
                {
                    $invitado->costo=(($usuario->adultos)*$gastoPorAdulto)+(($usuario->menores)*$gastoPorNiño);
                    $invitado->balance=($invitado->costo)-($usuario->gasto);
                    $invitado->save();
                }
            }
            $evento->costo_organizador=(($evento->adultos_organizador)*$gastoPorAdulto)+(($evento->niños_organizador)*$gastoPorNiño);
            $evento->balance_organizador=($evento->costo_organizador)-($evento->gastos_organizador);
            $evento->metodocuenta = 5;
            $evento->save();
            return Redirect::back();
           
        }
    }
    public function cerrarEvento(Request $request)
    {
      $eventoId=$request['eventoid'];
      $invitados=\App\Invitado::where('idevento',$eventoId)->get();
      $evento=\App\Evento::find($eventoId);
      $niños=$evento->menoresmax;
      $adultos=$evento->adultosmax;
      foreach ($invitados as $invitado)
      {
         $niños=$niños+$invitado->menores;
         $adultos=$adultos+$invitado->adultos;
      }
      $evento->menoresmax = $adultos;
      $evento->adultosmax = $niños;
      $evento->cerrado=1;
      $evento->save();
      return Redirect::back();
    }
}