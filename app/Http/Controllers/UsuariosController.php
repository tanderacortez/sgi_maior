<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\AccountSettings;
use App\Role;
use Illuminate\Support\Facades\Gate;

class UsuariosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->usuario = new User();
    }


    public function viewListagem (){
        if(Gate::denies('usuario-view')){
            abort(403, 'Não Autorizado');
        }

        $list_roles = Role::all();
        $list_users = User::all();
        return view('usuarios.listagem', [
            'usuarios' => $list_users,
            'roles' => $list_roles
            ]);
    }

    public function viewNovo (){
        return view('usuarios.novo');
    }

    protected function getUsuarios ($id){
        return $this->usuario->find($id);
    }

    public function viewEditar ($id){
        $list_users = User::all();
        return view('usuarios.editar', [
            'usuario' => $this->getUsuarios($id)
        ]);
    }

    public function update(Request $request)
    {
        $usuario = Auth::user(); // resgata o usuario

        $usuario->name = Request::input('name'); // pega o valor do input username
        $usuario->email = Request::input('email'); // pega o valor do input email

        if ( ! Request::input('password') == '') // verifica se a senha foi alterada
        {
            $usuario->password = bcrypt(Request::input('password')); // muda a senha do seu usuario já criptografada pela função bcrypt
        }

        $usuario->save(); // salva o usuario alterado =)

        return redirect('/usuarios')->with("message", "Usuário alterado com sucesso!"); // redireciona pra rota que você achar melhor =)
    }


    public function destroy ($id){ //Excluindo Usuário
        $user = User::find($id);
        $delete = $user->delete();
        return redirect()->back()->with('message', 'Usuário excluído com sucesso!');
    }

    //ADICIONAR CREDENCIAL AO USUÁRIO

    public function add_credencial ($id){
        $credenciais = Role::all();
        //dd($credenciais);
        return view('usuarios.credenciais._modalAdd-Credencial', [
            'user' => $this->getUsuarios($id),
            'credenciais' => $credenciais
        ]);
    }

    public function store_credencial (Request $request, $id){
        //dd($id);
        $usuario = User::find($id);
        $dados = $request->all();
        $role = Role::find($dados['credencial_id']);
        $usuario->adicionarCredencial($role);
        return redirect()->back();
    }

}
