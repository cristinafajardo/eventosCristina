<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Evento;
use App\Item;
use App\Itemok;


class LlevarItems extends Controller
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
         \App\Itemok::create([
                'iditem' => $request['iditem'],
                'cantidad' => $request['cantidad'],
                'idusuario' =>$request['cantidad']
                
            ]);
         //return redirect('que');// CAMBIAR ESTO PARA VOLVER AL MISMO EVENTO CON IDEVENTO
        // return Redirect::action('EventosController@edit');
        // return view('includes.eventos.editarEvento')->with('61');
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
        $itemok=\App\Itemok::find($id);
        $item= \App\Item::all();
       return view('includes.eventos.llevarItem', $item);
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
