<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor1@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'fornecedor 2',
            'site' => 'fornecedor2.com.br',
            'uf' => 'SP',
            'email' => 'fornecedor2@gmail.com.br',
        ]);
    }
}
