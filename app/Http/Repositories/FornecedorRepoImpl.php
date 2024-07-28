<?php

namespace App\Http\Repositories;

use App\Fornecedor;
use App\Http\Interfaces\FornecedorRepoInterface;

class FornecedorRepoImpl implements FornecedorRepoInterface
{
    public function getAll()
    {
    }

    public function getById($id)
    {
    }

    public function create(array $dados)
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = $dados['nome'];
        $fornecedor->save();

        return $fornecedor;
    }

    public function update(array $data, $id)
    {
    }

    public function destroy($id)
    {
        Fornecedor::find($id)->delete();
    }

    public function paginate($number)
    {
        return Fornecedor::paginate($number);
    }
}
