<?php

namespace App\Http\Services;

use App\Http\Interfaces\ClienteRepoInterface;
use Illuminate\Http\Request;

class ClienteService
{
  private $clienteRepository;

  public function __construct(ClienteRepoInterface $clienteRepoInterface)
  {
    $this->clienteRepository = $clienteRepoInterface;
  }

  public function index(Request $request)
  {
    $clientes = $this->clienteRepository->paginate(10);
    return response(view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]));
  }

  public function create()
  {
    return response(view('app.cliente.create'));
  }

  public function store(Request $request)
  {
    $regras = [
      'nome' => 'required|min:3|max:40',
    ];

    $feedback = [
      'required' => 'O campo :attribute deve ser preenchido',
      'nome.min' => 'O campo nome de ter no mínimo 3 caracteres',
      'nome.max' => 'O campo nome de ter no máximo 40 caracteres',
    ];

    $request->validate($regras, $feedback);

    $dados = ['nome' =>$request->get('nome')];
    $this->clienteRepository->create($dados);

    return redirect()->route('cliente.index');
  }

  public function destroy($id) {
    $this->clienteRepository->destroy($id);
    return redirect()->route('cliente.index');
  }
}