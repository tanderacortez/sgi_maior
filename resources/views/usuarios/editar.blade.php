@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Usuários
        <small>Editar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/usuarios'}}">Usuários</a></li>
        <li class="active">Editar</li>
    </ol>

@stop

@section('content')

    <!-- Inicio Usuários -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Usuário:</h3>
                </div>
                <form action="{{url('/usuarios/update')}}"  method="post" role="form">
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <input type="hidden" name="id" value="{{$usuario->id}}">
                    <div class="box-body">
                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label for="validationServer01">Nome:</label>
                                <input type="text" id="validationServer01"   value="{{$usuario->name}}" class="form-control" name="name" placeholder="Empresa" required>
                            </div>
                            <div class="col-xs-6">
                                <label>E-mail:</label>
                                <input type="text" class="form-control" id="validationServer02" value="{{$usuario->email}}" name="email" placeholder="Resp. na empresa" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label>Senha:</label>
                                <input type="password" name="password" class="form-control" placeholder="{{ trans('adminlte::adminlte.password') }}">
                            </div>


                    </div>
                    <div class="box-footer">
                        <a href="javascript:history.back();" class="btn btn-default">Voltar</a>
                        <button type="submit" class="btn btn-info pull-right">Salvar</button>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- Fim Usuários -->



@stop

@section('js')

    <script type="text/javascript">
        // The Calender
        $('#calendar').datepicker();
    </script>
@stop
