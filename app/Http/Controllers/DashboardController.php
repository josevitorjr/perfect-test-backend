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
        $products = $this->objProduct->paginate(20);
        return view('dashboard', compact('products'));
    }
}
