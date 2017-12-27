@extends('layouts.app-admin')

@section('content')

    <div class="container">
        <div class="row mb-4" style="max-width: 1140px;">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <p class="h2">Clientes</p>
        </div>

        <div class="row col-md-12 panel panel-default" style="padding: 10px;" >
            <table id="example" class="table table-striped table-bordered mt-4" cellspacing="0" width="100%">
                <thead class="bg-secondary" >
                <tr>
                    <th>Id</th>
                    <th>Responsável</th>
                    <th>Empresa</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Relacionamento</th>
                    <th>Atendimento</th>

                    <th>Ações</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Responsável</th>
                    <th>Empresa</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th> Relacionamento</th>
                    <th>Atendimento</th>

                    <th>Ações</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($clientes) > 0)
                    @foreach($clientes as $clientes_result)
                        <tr>
                            <td scope="row">{{$clientes_result->id}}</td>
                            <td>{{$clientes_result->nome_resp}}</td>
                            <td>{{$clientes_result->empresa}}</td>
                            <td>{{$clientes_result->email}}</td>
                            <td>{{$clientes_result->dddcel}} {{$clientes_result->celular}}</td>
                            <td>{{$clientes_result->status_relacionamento}}</td>
                            <td>{{$clientes_result->atendimento}}</td>

                            <td>
                                <a href="{{ url("/$clientes_result->id/clientes/detalhe") }}" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                &nbsp;|&nbsp;<a href="{{ url("/clientes/$clientes_result->id/editar") }}" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i>
                                </a>
                                &nbsp;|&nbsp;<a href="{{ url("/clientes/$clientes_result->id/delete") }}" >
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
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