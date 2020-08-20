<?php

use Illuminate\Database\Seeder;
use App\Models\ProductModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ProductModel $product)
    {
        $product->create([
            'nome'=>'Ventilador',
            'descricao'=>'Ventilador Turbo',
            'preco'=>'100.00'
        ]);

        $product->create([
            'nome'=>'Notebook',
            'descricao'=>'Notebook Dell',
            'preco'=>'3550.00'
        ]);

        $product->create([
            'nome'=>'Monitor',
            'descricao'=>'Monitor 4k',
            'preco'=>'5000.00'
        ]);
    }
}
