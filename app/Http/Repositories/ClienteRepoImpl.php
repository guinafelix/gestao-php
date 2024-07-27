<?php 
namespace App\Http\Repositories;

use App\Cliente;
use App\Http\Interfaces\ClienteRepoInterface;

class ClienteRepoImpl implements ClienteRepoInterface {
  public function getAll() {
    
  }
  
  public function getById($id){}
  public function create(array $dados){
    $cliente = new Cliente();
    $cliente->nome = $dados['nome'];
    $cliente->save();
    return $cliente;
  }
  public function update(array $data, $id){}
  public function destroy($id){
    Cliente::find($id)->delete();
  }

  public function paginate($number) {
    return Cliente::paginate($number);
  }
}