<?php 
namespace App\Http\Repositories;

use App\Cliente;
use App\Http\Interfaces\ClienteRepoInterface;

class ClienteRepoImpl implements ClienteRepoInterface {
  public function getAll() {

  }
  
  public function getById($id){}
  public function create(array $data){

  }
  public function update(array $data, $id){}
  public function delete($id){

  }

  public function paginate($number) {
    return Cliente::paginate($number);
  }
}