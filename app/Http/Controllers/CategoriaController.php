<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{

    public function _construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Categoria::all();
        return response()->json(['data'=>$categoria,'status'=>true]);
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
        $data = $request->only(['nome']);
        $produtos = $request['produtos'];

        $categoria=Categoria::create($data);

        if($categoria){
            $categoria->produto()->createMany($produtos);
             return response()->json(['data'=>$categoria,'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar Categoria','status'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=Categoria::find($id);

        if($categoria){
             return response()->json(['data'=>$categoria,'status'=>true]);
        }else{
            return response()->json(['data'=>'Categoria não encontrada','status'=>false]);
        }
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
        $data=$request->all();
        $categoria=Categoria::find($id);

        if($categoria){
            $categoria->update($data);
             return response()->json(['data'=>$categoria,'status'=>true]);
        }else{
            return response()->json(['data'=>'Categoria não encontrada','status'=>false]);
        }
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
        $categoria=Categoria::find($id);

        if($categoria){
            $categoria->delete();
             return response()->json(['data'=>'deletado','status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao deletar','status'=>false]);
        }
    }
}
