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
use App\Usuario;
use App\Evento;
use App\Item;
use App\Itemok;
use Laracasts\Flash\Flash;


class ItemsController extends Controller
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
        \App\Item::create([
           'idevento' => $request['eventoid'],
           'nombre' => $request['nombrearticulo'],
           'cantidad' =>$request['cantidad']
        ]);

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
        \App\Item::destroy($id);
        flash('Item eliminado', 'success')->important();
         return Redirect::back();
    }
    public function asignarItem(Request $request)
    {      
        \App\Itemok::create([
            'iditem' => $request['nombreitem'],
            'cantidad' => $request['cantidad'],
            'idusuario' =>$request['nombreinvitado']                
        ]);
        return Redirect::back();
    }
    public function llevarItem(Request $request)
    {   //dd($request['id']);
        \App\Itemok::create([
           'iditem' => $request['nombreitem'],
           'cantidad' => $request['cantidad'],
           'idusuario' =>session('usuario_id')                
        ]);
        return Redirect::back();
    }
}