<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*  SiteContato::create([
              'nome' => 'sistema de gestão',
              'telefone' => '85 9 993443933',
              'email' => 'contato@sistema.com.br',
              'motivo_contato' => 1,
              'mensagem' => 'mensagem genérica'
          ]); */
        factory(SiteContato::class, 10)->create();
    }
}
