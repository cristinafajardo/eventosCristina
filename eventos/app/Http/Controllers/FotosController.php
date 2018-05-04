<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use DB;
use Validator;
use App\Usuario;
use App\Evento;
use App\Foto;
use Redirect;

class FotosController extends Controller
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
            $file=$request['file'];      
            $url_image=$file->getClientOriginalName();
            $Destinopath=public_path().'/img/ImagenesEvento/';
            $subir=$file->move($Destinopath,$url_image);
            \App\Foto::create([
                'titulo' => $request['nombre'],
                'photo' => '../img/ImagenesEvento/'.$url_image,
                'idevento' => $request['eventoid']
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
       \App\Foto::destroy($id);
        flash('Imagen eliminada correctamente.', 'success')->important();
        return Redirect::back();
    }
}
