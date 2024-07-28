<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Http\Services\FornecedorService;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    private $fornecedorService;

    public function __construct(FornecedorService $fornecedorService)
    {
        $this->fornecedorService = $fornecedorService;
    }

    public function index()
    {
        return $this->fornecedorService->index();
    }

    public function listar(Request $request)
    {
        return $this->fornecedorService->listar($request);
    }

    public function adicionar(Request $request)
    {
        return $this->fornecedorService->adicionar($request);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        //Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
