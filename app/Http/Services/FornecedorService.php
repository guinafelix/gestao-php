<?php

namespace App\Http\Services;

use App\Http\Interfaces\FornecedorRepoInterface;
use Illuminate\Http\Request;

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

    public function listar(Request $request)
    {
        $filtros = $request->only(['nome', 'site', 'uf', 'email']);
        $fornecedores = $this->fornecedorRepository->search($filtros);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchida',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente',
            ];

            $request->validate($regras, $feedback);

            $this->fornecedorRepository->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $update = $this->fornecedorRepository->update($request->all(), $request->input('id'));

            if ($update) {
                $msg = 'Atualização realizado com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
