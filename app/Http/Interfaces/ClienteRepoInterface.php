<?php 

namespace App\Http\Interfaces;

interface ClienteRepoInterface {
  public function getAll();
  public function getById($id);
  public function create(array $data);
  public function update(array $data, $id);
  public function delete($id);
  public function paginate($number);
}