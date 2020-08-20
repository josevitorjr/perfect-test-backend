<?php

use Illuminate\Database\Seeder;
use App\Models\ClientModel;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ClientModel $client)
    {
        $client->create([
            'nome'=>'José Vitor',
            'email'=>'josevitor@gmail.com',
            'cpf'=>'11111111111'
        ]);

        $client->create([
            'nome'=>'Paulo',
            'email'=>'paulo@gmail.com',
            'cpf'=>'22222222222'
        ]);

        $client->create([
            'nome'=>'Maria',
            'email'=>'maria@gmail.com',
            'cpf'=>'33333333333'
        ]);
    }
}
