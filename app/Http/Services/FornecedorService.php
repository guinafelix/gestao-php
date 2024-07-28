<?php

namespace App\Http\Services;

use App\Http\Interfaces\FornecedorRepoInterface;

class FornecedorService
{
    private $fornecedorRepository;

    public function __construct(FornecedorRepoInterface $fornecedorRepoInterface)
    {
        $this->fornecedorRepository = $fornecedorRepoInterface;
    }

    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function excluir($id)
    {
        $this->fornecedorRepository->destroy($id);

        //Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
