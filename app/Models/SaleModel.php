<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $fillable = ['id_client','id_product','data','quantidade','desconto','status'];

    public function relClients(){
        return $this->hasOne('App\Models\ClientModel', 'id', 'id_client');
    }
    public function relProducts(){
        return $this->hasOne('App\Models\ProductModel', 'id', 'id_product');
    }
}
