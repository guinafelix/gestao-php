<?php

namespace App\Http\Interfaces;

interface ClienteRepoInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function paginate($number);
}
