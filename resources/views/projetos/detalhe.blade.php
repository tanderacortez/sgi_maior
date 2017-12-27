@extends('layout.app-admin')
@section('content')

    <div class="container">
    <nav class="breadcrumb mt-4">
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="{{ url("/projetos") }}">Projetos</a>
        <span class="breadcrumb-item active">Detalhe</span>
    </nav>

    <div class="row mt-5">
        <div >
            <div class="list-group">
                <a class="list-group-item" href="{{ url("/projetos") }}"><i class="fa fa-file-code-o fa-fw" aria-hidden="true"></i>&nbsp; Listagem</a>
                <a class="list-group-item" href="{{ url("/projetos/$projeto->id/editar") }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Editar Projeto</a>
                <a class="list-group-item" href="{{ url("/projetos/$projeto->id/configuracao") }}"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Editar Configurações</a>
                <a class="list-group-item" href="{{ url("/projetos/$projeto->id/documentacao") }}"><i class="fa fa-archive" aria-hidden="true"></i> &nbsp; Documentação</a>
                <a class="list-group-item" href="#" onclick="window.print() "><i class="fa fa-print" aria-hidden="true"></i>&nbsp;&nbsp; Imprimir</a>
                <a class="list-group-item" href="{{ url("/projetos/$projeto->id/delete_projetos") }}"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>&nbsp; Excluir Projeto</a>
            </div>
        </div>

        <div class="col-md-9 ml-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active bg-light" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Projeto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-light" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Configurações</a>
                </li>
                <!-- <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         Dropdown
                     </a>
                 <!--<div class="dropdown-menu">
                         <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1">@fat</a>
                         <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a>
                     </div>
                </li>-->
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table mt-2">
                        <tbody>
                        <tr>
                            <td style="border-top: 0;">
                                <label class="font-weight-bold">Projeto:</label>
                                <p class="mt-0 mb-0">{{$projeto->nome}}</p>
                            </td>
                            <td style="border-top: 0;">
                                <label class="font-weight-bold">Cliente:</label>
                                <p class="mt-0 mb-0">
                                    @if($projeto->clientes != "")
                                        {{$projeto->clientes->empresa}}
                                    @else
                                        Sem Cliente
                                    @endif
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold"> Início do contrato:</label>
                                <p class="mt-0 mb-0">{{$projeto->dataInicioContrato}}</p>
                            </td>
                            <td>
                                <label class="font-weight-bold"> Final do contrato:</label>
                                <p class="mt-0 mb-0">{{$projeto->dataFimContrato}}</p>
                            </td>
                            <td>
                                <label class="font-weight-bold"> Novo Prazo acordado:</label>
                                <p class="mt-0 mb-0">{{$projeto->novo_prazo_acordado}}</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="font-weight-bold">  Etapa:</label>
                                <p class="mt-0 mb-0">
                                    @if($projeto->estapa_dev == 1)
                                        Planejamento
                                    @elseif($projeto->estapa_dev == 2)
                                        Desenvolvimento
                                    @elseif($projeto->estapa_dev == 3)
                                        Validação Interna
                                    @elseif($projeto->estapa_dev == 4)
                                        Validação com o Cliente
                                    @endif
                                </p>
                            </td>
                            <td colspan="2">
                                <label class="font-weight-bold">Atendimento:</label>
                                <p class="mt-0 mb-0">{{$projeto->atendimento_da_conta}}</p>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <label class="font-weight-bold">Situação atual:</label><p class="mt-0 mb-0"></p>
                                <label  class="badge badge-danger">Atrasado</label>
                            </td>

                            <td >
                                <label class="font-weight-bold">Status:</label>
                                <p class="mt-0 mb-0">
                                    @if($projeto->status == 1)
                                        Em Andamento
                                    @elseif($projeto->status == 2)
                                        Parado Interno
                                    @elseif($projeto->status == 3)
                                        Parado Cliente
                                    @elseif($projeto->status == 4)
                                        Exec. alterações finais
                                    @elseif($projeto->status == 5)
                                        Entregue
                                    @elseif($projeto->status == 6)
                                        Suspenso
                                    @elseif($projeto->status == 7)
                                        Cancelado
                                    @endif
                                </p>
                            </td>
                            <td >
                                <label class="font-weight-bold">Criticidade:</label>
                                <p class="mt-0 mb-0">{{$projeto->nivel_criticidade}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="font-weight-bold">Status Motivo:</label>
                                <p class="mt-0 mb-0">{{$projeto->status_motivo}} </p>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="font-weight-bold">Observação:</label>
                                <p class="mt-0 mb-0"> {{$projeto->observacao}}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table mt-2">
                        <tbody>
                        <tr>
                            <td style="border-top: 0;">
                                <label class="font-weight-bold">Dados Gerencieme:</label>
                                <p class="mt-0 mb-0">{{$projeto->dados_gerencieme}} </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold"> Dados do Domínio:</label>
                                <p class="mt-0 mb-0">{{$projeto->local_dominio}}  </p>
                                <p class="mt-0 mb-0">{{$projeto->dados_dominio}}  </p>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold"> Dados do Painel:</label>
                                <p class="mt-0 mb-0">{{$projeto->local_painel}}  </p>
                                <p class="mt-0 mb-0">{{$projeto->dados_painel}}  </p>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold"> Dados de FTP:</label>
                                <p class="mt-0 mb-0">{{$projeto->dados_ftp}} </p>
                            </td>
                        </tr>
                        @if($projeto->local_ecommerce != "" or $projeto->dados_ecommerce != "")
                            <tr>
                                <td>
                                    <label class="font-weight-bold"> Dados do E-commerce:</label>
                                    <p class="mt-0 mb-0">{{$projeto->local_ecommerce}} </p>
                                    <p class="mt-0 mb-0">{{$projeto->dados_ecommerce}} </p>

                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!--<div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">...</div>
                <div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">...</div> -->
            </div>
        </div>
    </div>
    </div>
@endsection