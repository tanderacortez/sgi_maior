@extends('adminlte::page')

@section('title', 'Novo Cliente')

@section('content_header')

    <h1>
        Clientes
        <small>Novo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#{{'/clientes'}}">Clientes</a></li>
        <li class="active">Novo</li>
    </ol>

@stop

@section('content')

    <!-- Inicio Clientes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Entre com os dados do cliente:</h3>
                </div>
                <form action="{{url('/clientes/store')}}"  method="post" role="form">
                    {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                        <div class="box-body">

                                <div class="row form-group">
                                    <div class="col-xs-6">
                                        <label for="validationServer01">Empresa:</label>
                                        <input type="text" id="validationServer01" class="form-control" name="empresa" placeholder="Empresa" required>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Responsável na empresa:</label>
                                        <input type="text" class="form-control" id="validationServer02" name="nome_resp" placeholder="Resp. na empresa" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-6">
                                        <label>E-mail:</label>
                                        <input type="email" class="form-control" id="validationServer03" name="email" id="inputEmail3" placeholder="E-mail" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <label>DDD:</label>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(999)"' name="dddcel" data-mask>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>Celular:</label>
                                        <input type="text" class="form-control" name="celular" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-6">
                                        <label>Status Relacionamento:</label>
                                        <select class="form-control mr-2" id="validationServer05" name="status_relacionamento" required>
                                            <option value="Ótimo" >Ótimo</option>
                                            <option value="Estável" >Estável</option>
                                            <option value="Atenção" >Necessita Atenção</option>
                                            <option value="Crítico" >Crítico</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Atendimento</label>
                                        <select class="form-control mr-2" id="validationServer05" name="atendimento" required>
                                            <option value="Mariana Mel" >Mariana Mel</option>
                                            <option value="Rebeca" >Rebeca Monteiro</option>
                                            <option value="Tandera" >Tandera Cortêz</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="row form-group">
                                <div class="col-xs-12">
                                    <label>Observações:</label>
                                    <textarea class="form-control " id="exampleFormControlTextarea1" name="obs" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Voltar</button>
                            <button type="submit" class="btn btn-info pull-right">Salvar</button>
                        </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- Fim Clientes -->



@stop

@section('js')

    <script type="text/javascript">


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
