<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller

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
        //Mostrar as informações salvas no banco de dados.
        $produto=Produto::all();
        return response()->json(['data'=>$produto,'status'=>true]);
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
        //Salvar informações no banco de dados.
        $data = $request->all();
        $produto=Produto::create($data);

        if($produto){
             return response()->json(['data'=>$produto,'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar produto','status'=>false]);
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
        //Pega determinada informação do banco com base no ID.
        $produto=Produto::find($id);

        if($produto){
             return response()->json(['data'=>$produto,'status'=>true]);
        }else{
            return response()->json(['data'=>'Produto não encontrado','status'=>false]);
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
        //
        $data=$request->all();
        $produto=Produto::find($id);

        if($produto){
            $produto->update($data);
             return response()->json(['data'=>$produto,'status'=>true]);
        }else{
            return response()->json(['data'=>'Produto não encontrado','status'=>false]);
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
        $produto=Produto::find($id);

        if($produto){
            $produto->delete();
             return response()->json(['data'=>'deletado','status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao deletar','status'=>false]);
        }
    }
}
