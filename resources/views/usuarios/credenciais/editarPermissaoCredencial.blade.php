@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Permissões / Credenciais
        <small>Adicionar/Editar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/usuarios'}}">Usuários</a></li>
        <li class="active">Listagem</li>
    </ol>
@stop

@section('content')

    @if (Session::has('message'))
        <div class="row">
            <div class="pad margin no-print">
                <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i> Note:</h4>
                    {{Session::get('message')}}
                </div>
            </div>
        </div>
    @endif

    <!-- Inicio Usuários -->
    <div class="pull-left margin-bottom">
        <div class="btn-group left">
            <a href="javascript:history.back()" class="btn  btn-default btn-flat pull-left">
            <i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
        </div>
    </div>

    <div class="clearfix margin-bottom pull-right">
        <div class="btn-group right">
            <a href="#" class="btn  btn-info btn-flat" data-toggle="modal" data-target="#modal-info"><i class="fa fa-lock"></i> Criar Permissão</a></div>
     <!--   <div class="btn-group right">
            <a href="'usuarios/credenciais'}}" class="btn  btn-primary btn-flat pull-right"><i class="fa fa-id-card" ></i> Credenciais/Papéis</a>
        </div>-->

    </div>

    <!-- Inicio Permissoes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicione as permissões para a Credencial: {{$credenciais->nome}}</h3>
                </div>
                <form action="{{ route('usuarios.credenciais.store_permissao', $credenciais->id)}}"  method="post" role="form">
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <div class="box-body">

                        <div class="row form-group">
                            <div class="col-md-8">
                                <div class="input-group margin">

                                    <select class="form-control" name="permissao_id">
                                        <option value="">Selecione a permissão..</option>
                                        @foreach($permissoes as $permissoes_result){
                                            <option value="{{$permissoes_result->id}}" >{{$permissoes_result->nome}} - {{$permissoes_result->descricao}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit"  class="btn btn-info btn-flat">Adicionar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->


                <!-- adicionar  a tabela -->
                <div class="box">
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped dataTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th align="">Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Permissão</th>
                                <th>Descrição</th>
                                <th align="">Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @if(count($credenciais->permissions) > 0)
                                @foreach($credenciais->permissions as $permissoes_result)
                                    <tr>
                                        <td scope="row">{{$permissoes_result->id}}</td>
                                        <td>{{$permissoes_result->nome}}</td>
                                        <td>{{$permissoes_result->descricao}}</td>
                                        <td align="center">
                                          <form action="{{ route("usuarios.credenciais.destroy_permcred", [$credenciais->id, $permissoes_result->id]) }}" method="post">
                                              &nbsp;<a href="{{ route("usuarios.credenciais.destroy_permcred", [$credenciais->id, $permissoes_result->id]) }}" class="btn btn-danger" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                          </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-body -->

            </div>
        </div>
    </div>
    <!-- Fim Permissao -->

<!-- Modal de adicionar permissao-->
    <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
            <form action="{{route('permissoes.store')}}"  method="post" role="form">
            {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Adicionar Permissão</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="validationServer01">Nome:</label>
                                <input type="text" id="validationServer01" class="form-control" name="nome" placeholder="Ex: tarefa-view" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationServer01">Descrição:</label>
                                <input type="text" id="validationServer01" class="form-control" name="descricao" placeholder="Ex: Ver Tarefa" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-outline">Salvar</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- Fim Modal de Credenciais -->
@stop

@section('js')

    <script type="text/javascript">

        //Datatable plugin
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            } );
        } );

    </script>
@stop
