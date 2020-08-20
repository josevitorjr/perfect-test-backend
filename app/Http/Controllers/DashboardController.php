<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductModel;
use App\Models\ClientModel;
use App\Models\SaleModel;

class DashboardController extends Controller
{
    private $objProduct;
    private $objClient;
    private $objSale;

    public function __construct(){
        $this->objProduct = new ProductModel();
        $this->objClient = new ClientModel();
        $this->objSale = new SaleModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->objProduct->paginate(10);
        $clients = $this->objClient->paginate(10);
        $sales = $this->objSale->paginate(10);//
        $results= $this->objSale->selectRaw('status, sum(quantidade) as quantidade, sum(quantidade*(products.preco-desconto)) as valor')->leftJoin('products', 'id_client', '=', 'products.id')->groupBy('status')->get();
        return view('dashboard', compact('products','clients', 'sales', 'results'));
    }
}
