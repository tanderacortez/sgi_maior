<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class CredenciaisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->role = new Role();
        $this->permission = new Permission();
    }

    //INICIO DO CRUD DE CREDENCIAIS ====================================================================

    public function viewListagem (){
        $list_permissions = Permission::all();
        $list_roles = Role::all();
        return view('usuarios.credenciais.listagem', [
           'permissions' => $list_permissions,
           'roles' => $list_roles
        ]);
    }

    public function viewNovo (){
        return view('usuarios.credenciais.novo');
    }

    public function store (Request $request){
        //var_dump($request->all());
        Role::create($request->all());
        return redirect('/usuarios/credenciais')->with("message", "Credencial criada com sucesso!");
    }

    protected function getCredencial ($id){
        return $this->role->find($id);
    }

    public function viewEditar ($id){ //Editar a Credencial
        return view('usuarios.credenciais._modalEditar-Credencial', [
            'credencial' => $this->getCredencial($id)
        ]);
    }

    public function update (Request $request){
        $projeto = $this->getCredencial($request->id);
        $projeto->update($request->all());
        return redirect('/usuarios/credenciais')->with("message", "Credencial alterada com sucesso!");
    }
    //FIM CRUD CREDENCIAIS ===================================================================================


    //INICIO CRUD CREDENCIAIS - PERMISSOES - MODAL ================================

    public function viewEditar_PermCred ($id){ //Abrir a página de permissões
        $list_credenciais = Role::where('id', $id)->with('permissions')->first();
        $list_permissions = Permission::all();
        return view('usuarios.credenciais.editarPermissaoCredencial', [
            //'credenciais' => $this->getCredencial($id), //pegando os dados da credencial pra exibir no modal
            'credenciais' => $list_credenciais, //pegando os dados da credencial pra exibir no modal
            'permissoes' => $list_permissions //pegando os dados da permissão pra exibir no modal
        ]);
    }


    public function store_permissao (Request $request, $id){ //Salvando Permissões
        //dd($id);
        $role = Role::find($id);
        $dados = $request->all();
        $permissao = Permission::find($dados['permissao_id']);
        $role->adicionarPermissao($permissao);
        return redirect()->back()->with('message', 'Permissão adicionada com sucesso!');
    }

    public function destroy_permcred ($id, $permissao_id){ //Excluindo Permissões
        //dd($id);
        $role = Role::find($id);
        //$dados = $request->all();
        $permissao = Permission::find($permissao_id);
        $role->removerPermissao($permissao);
        return redirect()->back()->with('message', 'Permissão excluída com sucesso!');
    }


    //protected function getPermissoesCred ($id){ //pegando as permissoes relacionadas a credencial
    //    return $this->role->find($id);
    //}

    //FIM CRUD CREDENCIAIS PERMISSOES - MODAL ===================================

}
