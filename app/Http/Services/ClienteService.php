<?php

namespace App\Http\Services;

use App\Http\Interfaces\ClienteRepoInterface;
use Illuminate\Http\Request;

class ClienteService {
  private $clienteRepository;

  public function __construct(ClienteRepoInterface $clienteRepoInterface) {
    $this->clienteRepository = $clienteRepoInterface;
  }

  public function index(Request $request){
    $clientes = $this->clienteRepository->paginate(10);
    return response(view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]));
  }

}