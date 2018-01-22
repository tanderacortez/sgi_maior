@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Usuários
        <small>Listagem</small>
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
    <div class="pull-left">
        <div class="btn-group left">
            <a href="javascript:history.back()" class="btn  btn-default btn-flat pull-left">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> Voltar</a>
        </div>
    </div>

    <div class="clearfix margin-bottom pull-right">
        <div class="btn-group right">
            <a href="{{'usuarios/novo'}}" class="btn  btn-info btn-flat  "><i class="fa fa-users"></i> Adicionar Usuário</a></div>
        <div class="btn-group right">
            <a href="{{'usuarios/credenciais'}}" class="btn  btn-primary btn-flat pull-right"><i class="fa fa-id-card" ></i> Credenciais/Papéis</a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> Usuários</h3>
                </div>
                <!-- /.box-header -->
                <div class="box">
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped dataTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Credencial</th>
                                <th>Criado em</th>
                                <th align="">Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Credencial</th>
                                <th>Criado em</th>
                                <th align="center">Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @if(count($usuarios) > 0)
                                @foreach($usuarios as $usuarios_result)
                                    <tr>
                                        <td scope="row">{{$usuarios_result->id}}</td>
                                        <td>{{$usuarios_result->name}}</td>
                                        <td>{{$usuarios_result->email}}</td>

                                        @if(count($usuarios_result->roles) > 0)
                                           @foreach($usuarios_result->roles as $roles_results)
                                                <td>{{$roles_results->nome}}</td>
                                            @endforeach
                                        @else
                                            <td> <small><em>Não definido</em></small></td>
                                        @endif

                                        <td>{{$usuarios_result->created_at}}</td>
                                        <td align="center">
                                            <a href="{{ route('usuarios.credenciais._addCred', $usuarios_result->id)}}" data-toggle="modal" data-target="#modal-info" class="btn btn-warning">
                                                <i class="fa fa-id-card" ></i>
                                            </a>

                                            <a href="{{ url("/usuarios/$usuarios_result->id/editar") }}" class="btn btn-warning">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true">
                                                </i>
                                            </a>
                                            &nbsp;<a href="{{ url("/usuarios/$usuarios_result->id/delete") }}" class="btn btn-danger" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
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
                <div class="box-footer clearfix">
                    <a href="{{'usuarios/novo'}}" class="btn btn-sm btn-info btn-flat pull-left">Adicionar Usuário</a>

                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <!-- Fim Usuários -->

<!-- Modal de adicionar credencial-->
    <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
                <div class="modal-content">
                    <!--conteudo do modal usuarios/credenciais/_modalAdd-Credencial.blade-->
                </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<!-- Fim Modal de Credenciais -->
@stop




@section('js')

<script type="text/javascript">
    //Limpa o cache dos modais após o fechamento
    //Ajuda no modal editar, pq senão ele puxa sempre o mesmo registro
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

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

    // The Calender
    $('#calendar').datepicker();
</script>
@stop


