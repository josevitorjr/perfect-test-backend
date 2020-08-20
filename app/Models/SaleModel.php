<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $fillable = ['nome','descricao','preco'];
}
