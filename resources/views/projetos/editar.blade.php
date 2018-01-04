@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Projetos
        <small>Editar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/projetos'}}">Projetos</a></li>
        <li class="active">Editar</li>
    </ol>

@stop

@section('content')

    <!-- Inicio Projetos -->
    <div class="row">
        <form action="{{url('/projetos/update')}}"  method="post" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Altere os dados do Projeto:</h3>
                </div>
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <input type="hidden" name="id" value="{{$projeto->id}}">
                    <div class="box-body">

                        <div class="row form-group">
                            <div class="col-xs-5">
                                <label for="validationServer01">Nome:</label>
                                <input type="text" id="validationServer01" class="form-control" value="{{$projeto->nome}}" name="nome" placeholder="Nome"  required>
                            </div>
                            <div class="col-xs-4">
                                <label>Cliente:</label>
                                <select class="form-control mr-2" id="validationServer07" name="id_cliente" required>
                                    <option value="">Sel. o cliente</option>
                                    @foreach($clientes as $cliente)
                                        @if($cliente->id == $projeto->id_cliente)
                                            <option value="{{$cliente->id}}" selected>{{$cliente->empresa}}</option>
                                        @else
                                            <option value="{{$cliente->id}}">{{$cliente->empresa}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label for="validationServer01">Tipo de Projeto:</label>
                                <select class="form-control mr-2" id="validationServer07" name="tipoProjeto" required>
                                    <option value="">Selecione</option>
                                    <option value="Aplicativo" @if($projeto->tipoProjeto =="Aplicativo") selected @endif>Aplicativo</option>
                                    <option value="E-commerce" @if($projeto->tipoProjeto =="E-commerce") selected @endif>E-commerce</option>
                                    <option value="WebSite" @if($projeto->tipoProjeto =="WebSite") selected @endif>WebSite</option>
                                    <option value="Sistema" @if($projeto->tipoProjeto =="Sistema") selected @endif>Sistema</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-xs-4">
                                <label>Data Início do Contrato:</label>
                                <input type="text" class="form-control inicio" id="validationServer03" value="{{date('Y-m-d', strtotime($projeto->dataInicioContrato))}}" placeholder="Data Início" name="dataInicioContrato" required>
                            </div>
                            <div class="col-xs-4">
                                <label>Data Fim do Contrato:</label>
                                <input type="text" class="form-control " id="datafim" value="{{date('Y-m-d', strtotime($projeto->dataFimContrato))}}" name="dataFimContrato" placeholder="Data Fim Contrato" >
                            </div>
                            <div class="col-xs-4">
                                <label>Novo prazo acordado:</label>
                                <input type="text" class="form-control datepicker" id="novoprazo" value="<?php if ($projeto->novo_prazo_acordado != ''){ echo date('Y-m-d', strtotime($projeto->novo_prazo_acordado)); } ?> " name="novo_prazo_acordado" placeholder="Novo Prazo">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label>Status:</label>
                                <select class="form-control mr-2" id="validationServer05" name="status"  required>
                                    <option value="">Sel. o status</option>
                                    <option value="Em Andamento" @if($projeto->status =="Em Andamento") selected @endif>Em Andamento</option>
                                    <option value="Parado Interno" @if($projeto->status =="Parado Interno") selected @endif>Parado Interno</option>
                                    <option value="Parado Cliente" @if($projeto->status =="Parado Cliente") selected @endif>Parado Cliente</option>
                                    <option value="Exec. alterações finais" @if($projeto->status =="Exec. alterações finais") selected @endif>Exec. alterações finais</option>
                                    <option value="Entregue" @if($projeto->status =="Entregue") selected @endif>Entregue</option>
                                    <option value="Suspenso" @if($projeto->status =="Suspenso") selected @endif>Suspenso</option>
                                    <option value="Cancelado" @if($projeto->status =="Cancelado") selected @endif>Cancelado</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label>Etapa</label>
                                <select class="form-control mr-2" id="validationServer07" name="etapa_dev" required>
                                    <option value="">Sel. a etapa</option>
                                    <option value="Planejamento" @if($projeto->etapa_dev =="Planejamento") selected @endif>Planejamento</option>
                                    <option value="Desenvolvimento" @if($projeto->etapa_dev =="Desenvolvimento") selected @endif>Desenvolvimento</option>
                                    <option value="Validação Interna" @if($projeto->etapa_dev =="Validação Interna") selected @endif>Validação Interna</option>
                                    <option value="Validação com o Cliente" @if($projeto->etapa_dev =="Validação com o Cliente") selected @endif>Validação com o Cliente</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-xs-6">
                                <label>Nível de Criticidade:</label>
                                <select class="form-control mr-2" id="validationServer08" name="nivel_criticidade" required>
                                    <option value="">Selecione..</option>
                                    <option value="Baixo" @if($projeto->nivel_criticidade =="Baixo") selected @endif>Baixo</option>
                                    <option value="Medio" @if($projeto->nivel_criticidade =="Medio") selected @endif>Médio</option>
                                    <option value="Alto" @if($projeto->nivel_criticidade =="Alto") selected @endif>Alto</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label>Recorrência</label>
                                <select class="form-control mr-2" id="validationServer08" name="tipo_recorrencia" required>
                                    <option value="">Selecione..</option>
                                    <option value="Nenhuma" @if($projeto->tipo_recorrencia =="Nenhuma") selected @endif>Nenhuma</option>
                                    <option value="Manutenção" @if($projeto->tipo_recorrencia =="Manutenção") selected @endif>Manutenção</option>
                                    <option value="Implementação" @if($projeto->tipo_recorrencia =="Implementação") selected @endif>Implementação</option>
                                    <option value="Manutenção/Implementação" @if($projeto->tipo_recorrencia =="Manutenção/Implementação") selected @endif>Manutenção/Implementação</option>
                                </select>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Observações:</label>
                                <textarea class="form-control " id="exampleFormControlTextarea1" name="observacao" rows="3">{{$projeto->observacao}}</textarea>
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

    <!-- Fim Clientes -->

    <!-- Inicio Configurações-->
    <div class="col-md-12">
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Configurações do Projeto</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box">
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Dados Domínio:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1"  name="dados_dominio" rows="3">{{$projeto->dados_dominio}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Dados Hospedagem/Painel:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_painel" rows="3">{{$projeto->dados_painel}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Dados E-commerce:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_ecommerce" rows="3">{{$projeto->dados_ecommerce}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Dados Ftp:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_ftp" rows="3">{{$projeto->dados_ftp}}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Dados Gerencieme:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_gerencieme" rows="3">{{$projeto->dados_gerencieme}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
    <!-- Fim configurações -->
        <div class="col-md-12">
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Voltar</button>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
            </div>
        </div>
    </div>
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

        $(function () {
            // The Calender
            $('.inicio').datepicker({
                format: 'yyyy/mm/dd',
                defaultViewDate: 'today',
                orientation: 'auto',
                zIndexOffset: '9999'

            });

            $('#datafim').datepicker({
                format: 'yyyy/mm/dd',
                defaultViewDate: 'today',
                orientation: 'auto',
                zIndexOffset: '9999'

            });
            $('#novoprazo').datepicker({
                format: 'yyyy/mm/dd',
                defaultViewDate: 'today',
                orientation: 'auto',
                zIndexOffset: '9999'
            });
        });


    </script>
@stop
