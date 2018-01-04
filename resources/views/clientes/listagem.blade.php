@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Clientes
        <small>Listagem</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{'/home'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{'/clientes'}}">Clientes</a></li>
        <li class="active">Listagem</li>
    </ol>


@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Clientes Estáveis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Satisfeitos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Necessitam de atenção</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Críticos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    @if (Session::has('message'))
        <div class="row">
            <div class="pad margin no-print">
                <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i> Note:</h4>
                    Cliente adicionado com sucesso!
                </div>
            </div>
        </div>
    @endif


    <!-- Inicio Clientes -->
    <div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Clientes</h3>
                <a href="{{'clientes/novo'}}" class="btn btn-sm btn-info btn-flat pull-right">Adicionar Cliente</a>

            </div>
            <!-- /.box-header -->
            <div class="box">
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped dataTable" cellspacing="0" width="100%">
                        <thead>
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
                            <th>Relacionamento</th>
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
                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="{{'clientes/novo'}}" class="btn btn-sm btn-info btn-flat pull-left">Adicionar Cliente</a>

            </div>
            <!-- /.box-footer -->
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
