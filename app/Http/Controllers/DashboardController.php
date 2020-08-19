<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class DashboardController extends Controller
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
        $product = $this->objProduct->all();
        return view('dashboard', compact('product'));
    }
}
