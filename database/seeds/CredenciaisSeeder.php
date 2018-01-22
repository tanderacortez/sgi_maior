<?php

use Illuminate\Database\Seeder;
use App\Role;

class CredenciaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criando credenciais padrões

        $p1 = Role::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Acesso total ao Sistema'
        ]);

        $p2 = Role::firstOrCreate([
            'nome' => 'Atendimento',
            'descricao' => 'Acesso restrito'
        ]);

        $p3 = Role::firstOrCreate([
            'nome' => 'Comercial',
            'descricao' => 'Acesso restrito'
        ]);

        $p4 = Role::firstOrCreate([
            'nome' => 'Dev',
            'descricao' => 'Time de Desenvolvimento'
        ]);
    }
}
