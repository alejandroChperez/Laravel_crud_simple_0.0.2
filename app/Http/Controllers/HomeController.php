<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\membersmodel;

class HomeController extends Controller
{
  //ESTO ES PARA TOMAR DATOS
    public function index()
    {
      $member = membersmodel::all();
      //esta se va redireccionar con las vistas y en la carpeta home apunta al index de la pagina
      return view('Home.index')->with('member',$member);
    }//fin de la function index

    //PARA INSERTAR DATOS
    public function insertdata(Request $request)
    {
      $member = new membersmodel();
      $member->nombre = $request->nombre;
      $member->apellido_paterno = $request->apellido_paterno;
      $member->apellido_materno = $request->apellido_materno;
      $member->direccion = $request->direccion;
      $member->save();
      return response()->json($member);
    }//fin e la funcion insertdata

    //PARA ACTUALIZAR DATOS
    public function updatedata(Request $request)
    {
      $member = membersmodel::find($request->id);
      $member->nombre = $request->nombre;
      $member->apellido_paterno = $request->apellido_paterno;
      $member->apellido_materno = $request->apellido_materno;
      $member->direccion = $request->direccion;
      $member->save();
      return response()->json($member);
    }//fin de la funcion updatedata

    //PARA ELIMINAR DATOS
    public function deletedata(Request $request)
    {
      membersmodel::where('id',$request->id)->delete();
      return response()->json();
    }



}//fin de la clase
