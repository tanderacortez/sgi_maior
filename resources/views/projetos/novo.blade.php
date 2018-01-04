@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Projetos
        <small>Novo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/projetos'}}">Projetos</a></li>
        <li class="active">Novo</li>
    </ol>

@stop

@section('content')

    <!-- Inicio Projetos -->
<div class="row">
    <form action="{{url('/projetos/store')}}"  method="post" role="form">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Entre com os dados do Projeto:</h3>
            </div>

            {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                <div class="box-body">

                    <div class="row form-group">
                        <div class="col-xs-4">
                            <label for="validationServer01">Nome:</label>
                            <input type="text" id="validationServer01" class="form-control" name="nome" placeholder="Nome"  required>
                        </div>
                        <div class="col-xs-4">
                            <label>Cliente:</label>
                            <select class="form-control mr-2" id="validationServer07" name="id_cliente" required>
                                <option value="">Sel. o cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->empresa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <label for="validationServer01">Tipo de Projeto:</label>
                            <select class="form-control mr-2" id="validationServer07" name="tipoProjeto" required>
                                <option value="">Selecione</option>
                                <option value="Aplicativo" >Aplicativo</option>
                                <option value="E-commerce" >E-commerce</option>
                                <option value="WebSite" >WebSite</option>
                                <option value="Sistema" >Sistema</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-xs-4">
                            <label>Data Início do Contrato:</label>
                            <input type="text" class="form-control inicio" id="datainicio" placeholder="Data Início" name="dataInicioContrato" required>
                        </div>
                        <div class="col-xs-4">
                            <label>Data Fim do Contrato:</label>
                            <input type="text" class="form-control " id="datafim" name="dataFimContrato" placeholder="Data Fim Contrato" >
                        </div>
                        <div class="col-xs-4">
                            <label>Novo prazo acordado:</label>
                            <input type="text" class="form-control datepicker" id="novoprazo" name="novo_prazo_acordado" placeholder="Novo Prazo">
                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label>Status:</label>
                            <select class="form-control mr-2" id="validationServer05" name="status" required>
                                <option value="">Sel. o status</option>
                                <option value="Em Andamento">Em Andamento</option>
                                <option value="Parado Interno">Parado Interno</option>
                                <option value="Parado Cliente">Parado Cliente</option>
                                <option value="Exec. alterações finais">Exec. alterações finais</option>
                                <option value="Entregue">Entregue</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label>Etapa</label>
                            <select class="form-control mr-2" id="validationServer07" name="etapa_dev" required>
                                <option value="">Sel. a etapa</option>
                                <option value="Planejamento">Planejamento</option>
                                <option value="Desenvolvimento">Desenvolvimento</option>
                                <option value="Validação Interna">Validação Interna</option>
                                <option value="Validação com o Cliente">Validação com o Cliente</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label>Nível de Criticidade:</label>
                            <select class="form-control mr-2" id="validationServer05" name="nivel_criticidade" required>
                                <option value="">Selecione..</option>
                                <option value="Baixo">Baixo</option>
                                <option value="Medio">Médio</option>
                                <option value="Alto">Alto</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label>Recorrência</label>
                            <select class="form-control mr-2" id="validationServer07" name="tipo_recorrencia" required>
                                <option value="">Selecione..</option>
                                <option value="Nenhuma">Nenhuma</option>
                                <option value="Manutenção">Manutenção</option>
                                <option value="Implementação">Implementação</option>
                                <option value="Manutenção/Implementação">Manutenção/Implementação</option>
                            </select>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label>Observações:</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="observacao" rows="3"></textarea>
                        </div>
                    </div>

                </div>


            <!-- /.box-body -->
        </div>
    </div>

<!-- Fim Projetos -->

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
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_dominio" rows="3"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Dados Hospedagem/Painel:</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_painel" rows="3"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Dados E-commerce:</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_ecommerce" rows="3"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Dados Ftp:</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_ftp" rows="3"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Dados Gerencieme:</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" name="dados_gerencieme" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>

    <div class="col-md-12">
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Voltar</button>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
            </div>
    </div>
<!-- Fim configurações -->
    </form>
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
