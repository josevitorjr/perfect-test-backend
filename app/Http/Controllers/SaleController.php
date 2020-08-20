<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\ClientModel;

class SaleController extends Controller
{
    private $objSale;
    private $objProduct;
    private $objClient;

    public function __construct(){
        $this->objSale=new SaleModel();
        $this->objProduct=new ProductModel();
        $this->objClient=new ClientModel();
    }

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
        $products= $this->objProduct->all();
        $clients= $this->objClient->all();
        return view('crud_sales',compact('products','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $insert = $this->objSale->create([
            'id_client'=>$request->client,
            'id_product'=>$request->product,
            'data'=>date('Y-m-d', strtotime($request->date)),
            'quantidade'=>$request->quantity,
            'desconto'=>$request->discount,
            'status'=>$request->status
        ]);
        if($insert){
            return redirect('/#sales')->with('status', 'Venda Cadastrada Com Sucesso!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(){
        $client = Input::get('client');
        echo $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale= $this->objSale->find($id);
        $products= $this->objProduct->all();
        $clients= $this->objClient->all();
        return view('crud_sales', compact('sale','products','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id)
    {
        $update = $this->objSale->where(['id'=>$id])->update([
            'id_client'=>$request->client,
            'id_product'=>$request->product,
            'data'=>date('Y-m-d', strtotime($request->date)),
            'quantidade'=>$request->quantity,
            'desconto'=>$request->discount,
            'status'=>$request->status
        ]);
        if($update){
            return redirect('/#sales')->with('status', 'Venda Atualizada Com Sucesso!');;
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
        $delete = $this->objSale->destroy($id);
        return ($delete)?"Produto Deletado Com Sucesso!":"Falha ao Deletar o Produto!";

    }
}
