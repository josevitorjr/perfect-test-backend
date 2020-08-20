<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ProductModel;

class ProductController extends Controller
{
    private $objProduct;
    public function __construct(){
        $this->objProduct=new ProductModel();
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
        return view('crud_products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $insert = $this->objProduct->create([
            'nome'=>$request->name,
            'descricao'=>$request->description,
            'preco'=>$request->price
        ]);
        if($insert){
            return redirect('/#products')->with('status', 'Produto Cadastrado Com Sucesso!');;
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
        $product= $this->objProduct->find($id);
        return view('crud_products', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $update = $this->objProduct->where(['id'=>$id])->update([
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
        $delete = $this->objProduct->destroy($id);
        return ($delete)?"Produto Deletado Com Sucesso!":"Falha ao Deletar o Produto!";

    }
}
