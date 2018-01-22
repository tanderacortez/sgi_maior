@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>
        Credenciais
        <small>Listagem</small>
    </h1>


    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/usuarios'}}">Usuários</a></li>
        <li><a href="{{'/credenciais'}}">Credenciais</a></li>
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

    <!-- Botões de adicionar -->
    <div class="clearfix margin-bottom pull-right">
        <div class="btn-group right">
            <a href="#" class="btn btn-info btn-flat pull-right" data-toggle="modal" data-target="#modal-info"><i class="fa fa-users"></i> Adicionar Credencial</a>

        </div>
    </div>

<!-- Inicio listagem de credenciais -->
    <div class="row ">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-id-card" ></i> Listagem de Credenciais </h3>
                </div>
                <!-- /.box-header -->
                <div class="box">
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped dataTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th> Credenciais</th>
                                <th> Permissões</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th> Credenciais</th>
                                <th> Permissões</th>
                                <th>Alterar</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @if(count($roles) > 0)
                                @foreach($roles as $roles_result)
                                    <tr>
                                        <td scope="row">{{$roles_result->id}}</td>
                                        <td>{{$roles_result->nome}}</td>
                                        <td><?php $i = 1;
                                        $auxPermission = "";
                                                foreach($roles_result->permissions as $permission_results){
                                                    if($i == 4){
                                                        //echo '>>'. $i;
                                                        $auxPermission = $auxPermission . $permission_results->nome . '</br> ' ;
                                                        $i=1;
                                                    }else{
                                                        $auxPermission = $auxPermission . $permission_results->nome . ' |' ;
                                                    }
                                                $i= $i+1;
                                            }
                                            //echo $auxPermission;
                                            echo substr($auxPermission,0,-1);
                                            ?>
                                        </td>
                                        <td align="center">
                                            <a href="{{ url("/usuarios/credenciais/$roles_result->id/editar_permcred") }}"  alt="Alterar Permissões" class="btn btn-warning">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                </i>
                                            </a>
                                            &nbsp;<a href="{{ url("/usuarios/credenciais/$roles_result->id/editar") }}" data-toggle="modal" data-target="#modal-cred-edit" class="btn btn-warning">
                                                <i class="fa fa-pencil-square-o" ></i>
                                                </i>
                                            </a>
                                            &nbsp;<a href="{{ url("/usuarios/credenciais/$roles_result->id/delete") }}" class="btn btn-danger" >
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
            </div>
        </div>
    </div>
    <!-- Fim credenciais -->




<!-- Modal de Criação de Credenciais -->
<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <form action="{{url('usuarios/credenciais/store')}}"  method="post" role="form">
            {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Adicionar Credencial</h4>
                </div>
                <div class="modal-body">
                         <div class="row">
                            <div class="col-md-4">
                                <label for="validationServer01">Nome:</label>
                            <input type="text" id="validationServer01" class="form-control" name="nome" placeholder="Ex: Visitante" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationServer01">Descrição:</label>
                                <input type="text" id="validationServer01" class="form-control" name="descricao" placeholder="Ex: Acesso de users externos" required>
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
<!-- /.modal -->
<!-- Fim Modal de criação de Credenciais -->

<!-- Modal de edição de Credenciais -->
<div class="modal modal-info fade" id="modal-cred-edit">
    <div class="modal-dialog">
        <form action="{{url('usuarios/credenciais/update')}}"   method="post" role="form">
        {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
            <div class="modal-content">
                    <!-- aqui é onde é inserido os dados do credenciais/editar.blade -->
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!-- /.modal -->
</div>
<!-- Fim Modal de editar credenciais -->


<!-- Modal de edição de Permissões -->
<div class="modal modal-info fade" id="modal-perm-edit">
    <div class="modal-dialog">
        <form action="{{url('usuarios/credenciais/update')}}"  method="post" role="form">
        {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
            <div class="modal-content">
                <!-- aqui é onde é inserido os dados do credenciais/editar.blade -->
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!-- /.modal -->
</div>
<!-- Fim Modal de editar credenciais -->

@stop

@section('js')

<script type="text/javascript">
    //Limpa o cache dos modais após o fechamento
    //Ajuda no modal editar, pq senão ele puxa sempre o mesmo registro
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

    //Datatable plugin
    $(document).ready(function() {
        $.noConflict();
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
<!-- Vue JS adicionado dia 11-01-18  O elixir ajuda a não gerar cache-->
<script src="{{ elixir('js/app.js') }}" ></script>


@stop
