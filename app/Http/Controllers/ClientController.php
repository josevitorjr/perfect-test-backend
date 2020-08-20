<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\ClientModel;

class ClientController extends Controller
{
    private $objClient;
    public function __construct(){
        $this->objClient=new ClientModel();
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
        return view('crud_clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $insert = $this->objClient->create([
            'nome'=>$request->name,
            'email'=>$request->email,
            'cpf'=>$request->cpf
        ]);
        if($insert){
            return redirect('/#clients')->with('status', 'Cliente Cadastrado Com Sucesso!');;
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= $this->objClient->find($id);
        return view('crud_products', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $update = $this->objClient->where(['id'=>$id])->update([
            'nome'=>$request->name,
            'descricao'=>$request->description,
            'preco'=>$request->price
        ]);
        if($update){
            return redirect('/#products')->with('status', 'Produto Atualizado Com Sucesso!');;
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
        $delete = $this->objClient->destroy($id);
        return ($delete)?"Produto Deletado Com Sucesso!":"Falha ao Deletar o Produto!";

    }
}
