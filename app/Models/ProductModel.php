<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = ['nome','descricao','preco'];

    public function relSales(){
        return $this->hasMany('App\Models\SaleModel', 'id_product');
    }
}
