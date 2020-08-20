<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ClientModel;

class DashboardController extends Controller
{
    private $objProduct;
    private $objClient;

    public function __construct(){
        $this->objProduct = new ProductModel();
        $this->objClient = new ClientModel();
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
        return view('dashboard', compact('products','clients'));
    }
}
