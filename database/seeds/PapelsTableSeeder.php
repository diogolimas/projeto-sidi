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
            'descricao' => 'Só pode submeter respostas às atividades',
            'nome' => 'Aluno',
        ]);
        Papel::create([
            'descricao' => 'Pode criar turmas e avaliações',
            'nome' => 'Professor',
        ]);
        Papel::create([
            'descricao' => 'Pode fazer o que quiser',
            'nome' => 'Administrador',
        ]);
    }
}
