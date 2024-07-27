<?php 

namespace App\Http\Interfaces;

interface ClienteRepoInterface {

  public function index(Request $request);
  public function create();
  public function store(Request $request);
  public function show($id);
  public function edit($id);
  public function update(Request $request, $id);
  public function destroy($id);
}