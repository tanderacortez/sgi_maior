<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criando permissões padrões

        //USUÁRIOS ================================
        $usuarios1 = Permission::firstOrCreate([
            'nome' => 'usuario-view',
            'descricao' => 'Ver a lista de Usuários'
        ]);

        $usuarios2 = Permission::firstOrCreate([
            'nome' => 'usuario-create',
            'descricao' => 'Adicionar Usuários'
        ]);

        $usuarios3 = Permission::firstOrCreate([
            'nome' => 'usuario-edit',
            'descricao' => 'Editar Usuários'
        ]);

        $usuarios4 = Permission::firstOrCreate([
            'nome' => 'usuario-delete',
            'descricao' => 'Deletar Usuários'
        ]);

        //CLIENTES ================================

        $clientes1 = Permission::firstOrCreate([
            'nome' => 'cliente-view',
            'descricao' => 'Ver a lista de Clientes'
        ]);

        $clientes2 = Permission::firstOrCreate([
            'nome' => 'cliente-create',
            'descricao' => 'Adicionar Clientes'
        ]);

        $clientes3 = Permission::firstOrCreate([
            'nome' => 'cliente-edit',
            'descricao' => 'Editar Clientes'
        ]);

        $clientes4 = Permission::firstOrCreate([
            'nome' => 'cliente-delete',
            'descricao' => 'Deletar Clientes'
        ]);

        //PROJETOS ================================

        $projetos1 = Permission::firstOrCreate([
            'nome' => 'projeto-view',
            'descricao' => 'Ver a lista de Projetos'
        ]);

        $projetos2 = Permission::firstOrCreate([
            'nome' => 'projeto-create',
            'descricao' => 'Adicionar Projetos'
        ]);

        $projetos3 = Permission::firstOrCreate([
            'nome' => 'projeto-edit',
            'descricao' => 'Editar Projetos'
        ]);

        $projetos4 = Permission::firstOrCreate([
            'nome' => 'projeto-delete',
            'descricao' => 'Deletar Projetos'
        ]);

        //DEMANDAS ================================

        $tarefa1 = Permission::firstOrCreate([
            'nome' => 'tarefa-view',
            'descricao' => 'Ver a lista de Demandas'
        ]);

        $tarefa2 = Permission::firstOrCreate([
            'nome' => 'tarefa-create',
            'descricao' => 'Adicionar Demandas'
        ]);

        $tarefa3 = Permission::firstOrCreate([
            'nome' => 'tarefa-edit',
            'descricao' => 'Editar Demandas'
        ]);

        $tarefa4 = Permission::firstOrCreate([
            'nome' => 'tarefa-delete',
            'descricao' => 'Deletar Demandas'
        ]);

        //CREDENCIAIS ================================

        $credenciais1 = Permission::firstOrCreate([
            'nome' => 'credencial-view',
            'descricao' => 'Ver a lista de Credenciais'
        ]);

        $credenciais2 = Permission::firstOrCreate([
            'nome' => 'credencial-create',
            'descricao' => 'Adicionar Credenciais'
        ]);

        $credenciais3 = Permission::firstOrCreate([
            'nome' => 'credencial-edit',
            'descricao' => 'Editar Credenciais'
        ]);

        $credenciais4 = Permission::firstOrCreate([
            'nome' => 'credencial-delete',
            'descricao' => 'Deletar Credenciais'
        ]);

        echo "Permissões criadas com sucesso!";
    }
}
