<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->cliente = new Cliente();
    }

    public function viewNovo()
    {
        return view('clientes.novo');
    }

    public function store (Request $request){ //Inserir dados no banco(cadastrar novo cliente)
        //var_dump($request->all());
        Cliente::create($request->all());
        return redirect('/clientes')->with("message", "Cliente criado com sucesso!");

    }

    public function viewEditar($id){ //retorna a view de editar clientes
        return view('clientes.editar', [
            'cliente' => $this->getClientes($id)
        ]);
    }

    public function viewListagem() { //retorna a view de listagem clientes
        $list_clientes = Cliente::all();
        return view('clientes.listagem', [
            'clientes' => $list_clientes
        ]);

    }

    protected function getClientes($id){
        return $this->cliente->find($id);
    }

    public function update (Request $request){
        $cliente = $this->getClientes($request->id);
        $cliente->update($request->all());
        return redirect('/clientes')->with("message", "Cliente editado com sucesso!");
    }

    public function delete (Request $request){
        $cliente = $this->getClientes($request->id);
        $delete = $cliente->delete();
        return redirect('/clientes')->with("message", "Cliente excluído com sucesso!");
    }

    public function detalhe (Request $request){
        $list_dados = Cliente::find($request->id);
        return view ('clientes._modalDetalhe', [
           'cliente' => $list_dados
        ]);
    }
}
