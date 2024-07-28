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

    public function search(array $filtros)
    {
        $query = Fornecedor::with(['produtos']);

        if (! empty($filtros['nome'])) {
            $query->where('nome', 'like', '%'.$filtros['nome'].'%');
        }

        if (! empty($filtros['site'])) {
            $query->where('site', 'like', '%'.$filtros['site'].'%');
        }

        if (! empty($filtros['uf'])) {
            $query->where('uf', 'like', '%'.$filtros['uf'].'%');
        }

        if (! empty($filtros['email'])) {
            $query->where('email', 'like', '%'.$filtros['email'].'%');
        }

        return $query->paginate(20);
    }
}
