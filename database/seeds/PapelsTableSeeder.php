<?php

use Illuminate\Database\Seeder;
use App\Models\Papel;

class PapelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Papel::create([
            'permissao_id' => '1',
            'descricao' => 'Pode fazer nada',
            'nome' => 'Aluno',
        ]);
        Papel::create([
            'permissao_id' => '2',
            'descricao' => 'Pode fazer o que quiser',
            'nome' => 'Professor',
        ]);
        Papel::create([
            'permissao_id' => '3',
            'descricao' => 'Pode fazer o que quiser',
            'nome' => 'Administrador',
        ]);
    }
}
