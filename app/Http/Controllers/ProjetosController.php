<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Projeto;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->projeto = new Projeto();
    }

    public function viewNovo (){
        $list_clientes = Cliente::all();
        return view('projetos.novo', [
            'clientes' => $list_clientes
        ]);
    }

    public function store (Request $request){ //Inserir dados no banco(cadastrar novo projeto)
        //var_dump($request->all());
        Projeto::create($request->all());
        return redirect('/projetos')->with("message", "Projeto criado com sucesso!");
    }


    public function viewEditar ($id){
        $list_clientes = Cliente::all();
        return view('projetos.editar', [
            'projeto' => $this->getProjetos($id),
            'clientes' => $list_clientes
        ]);
    }

    public function update (Request $request){
        $projeto = $this->getProjetos($request->id);
        $projeto->update($request->all());
        return redirect('/projetos');
    }

    protected function getProjetos ($id){
        return $this->projeto->find($id);
    }

    public function viewListagem (){
        $title = 'Listagem de Projetos';
        $list_projetos = Projeto::All();
        return view('projetos.listagem', [
            'projetos' => $list_projetos
        ]);
    }

    public function viewDetalhe ($id){
        //var_dump($list_clientes);
        return view('projetos.detalhe', [
            'projeto' => $this->getProjetos($id)
        ]);
    }

    public function delete (Request $request){
        $projeto = $this->getProjetos($request->id);
        $delete = $projeto->delete();
        return redirect('/projetos')->with("message", "Projeto excluído com sucesso!");
    }


}
