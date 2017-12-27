@extends('layouts.app-admin')

@section('content')

    <div class="container">
        <div class="row mb-4" style="max-width: 1140px;">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <p class="h2">Projetos</p>
        </div>

        <div class="row col-md-12 panel panel-default" style="padding: 10px;" >
            <table id="example" class="table table-striped table-bordered mt-4" cellspacing="0" width="100%">
                <thead class="bg-secondary" >
                <tr>
                    <th>Id</th>
                    <th>Projeto</th>
                    <th>Cliente</th>
                    <th>Data início</th>
                    <th>Data Fim</th>
                    <th>Novo Prazo</th>
                    <th>Status</th>
                    <th>Etapa</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Projeto</th>
                    <th>Cliente</th>
                    <th>Data início</th>
                    <th>Data Fim</th>
                    <th>Novo Prazo</th>
                    <th>Status</th>
                    <th>Etapa</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($projetos) > 0)
                    @foreach($projetos as $projeto)
                        <tr>
                            <td scope="row">{{$projeto->id}}</td>
                            <td>{{$projeto->nome}}</td>
                            <td>
                                @if($projeto->clientes != "")
                                    {{$projeto->clientes->empresa}}
                                @else
                                    Sem Cliente
                                @endif
                            </td>
                            <td>{{$projeto->dataInicioContrato}}</td>
                            <td>{{$projeto->dataFimContrato}}</td>
                            <td>{{$projeto->novo_prazo_acordado}}</td>
                            <td>{{$projeto->status}}</td>
                            <td>{{$projeto->etapa_dev}}</td>
                            <td><a href="{{ url("/projetos/$projeto->id/detalhe") }}" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                |<a href="{{ url("/projetos/$projeto->id/editar") }}" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i>
                                </a>
                                |<a href="{{ url("/projetos/$projeto->id/configuracao") }}" >
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>

    <script type="text/javascript">
        //Plugin de tabela inserido (datatable https://datatables.net/examples/basic_init/filter_only.html)
        $(document).ready(function(){
            $('#example').DataTable( {
                "language": {   //parâmentros de tradução para português
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ no total)"
                }
            } );
        } );
    </script>

@endsection