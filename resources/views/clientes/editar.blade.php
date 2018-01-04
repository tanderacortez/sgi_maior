@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Clientes
        <small>Editar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/clientes'}}">Clientes</a></li>
        <li class="active">Editar</li>
    </ol>

@stop

@section('content')

    <!-- Inicio Clientes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar cliente:</h3>
                </div>
                <form action="{{url('/clientes/update')}}"  method="post" role="form">
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <input type="hidden" name="id" value="{{$cliente->id}}">
                    <div class="box-body">
                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label for="validationServer01">Empresa:</label>
                                <input type="text" id="validationServer01"   value="{{$cliente->empresa}}" class="form-control" name="empresa" placeholder="Empresa" required>
                            </div>
                            <div class="col-xs-6">
                                <label>Responsável na empresa:</label>
                                <input type="text" class="form-control" id="validationServer02" value="{{$cliente->nome_resp}}" name="nome_resp" placeholder="Resp. na empresa" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" id="validationServer03" value="{{$cliente->email}}" name="email" id="inputEmail3" placeholder="E-mail" required>
                            </div>
                            <div class="col-xs-2">
                                <label>DDD:</label>
                                <input type="text" class="form-control" value="{{$cliente->dddcel}}" data-inputmask='"mask": "(999)"' name="dddcel" data-mask>
                            </div>
                            <div class="col-xs-4">
                                <label>Celular:</label>
                                <input type="text" class="form-control" name="celular" value="{{$cliente->celular}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label>Status Relacionamento:</label>
                                <select class="form-control mr-2" id="validationServer05"  name="status_relacionamento" required>
                                    <option value="Ótimo" @if($cliente->status_relacionamento =='Ótimo') selected @endif>Ótimo</option>
                                    <option value="Estável"@if($cliente->status_relacionamento =='Estável') selected @endif>Estável</option>
                                    <option value="Atenção" @if($cliente->status_relacionamento =='Atenção') selected @endif>Necessita Atenção</option>
                                    <option value="Crítico" @if($cliente->status_relacionamento =='Crítico') selected @endif>Crítico</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label>Atendimento</label>
                                <select class="form-control mr-2" id="validationServer05" name="atendimento" required>
                                    <option value="Mariana Mel" @if($cliente->atendimento =='Mariana Mel') selected @endif>Mariana Mel</option>
                                    <option value="Rebeca" @if($cliente->atendimento =='Rebeca') selected @endif>Rebeca Monteiro</option>
                                    <option value="Tandera" @if($cliente->atendimento =='Tandera') selected @endif>Tandera Cortêz</option>
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
        // The Calender
        $('#calendar').datepicker();
    </script>
@stop
