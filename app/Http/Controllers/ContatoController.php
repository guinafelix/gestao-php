<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos'=> $motivo_contatos]);
    }

    public function salvar(Request $request) {
        $request->validate([
            'nome'=> 'required|string|max:40',
            'telefone' => 'required',
            'email'=> 'email',
            'motivo_contato'=> 'required',
            'mensagem'=> 'required|max:40',
        ]);
        SiteContato::create($request->all());
    }
}
