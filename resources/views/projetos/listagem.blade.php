@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>
        Projetos
        <small>Listagem</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Projetos</a></li>
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

                    <p>Projetos em Andamento</p>
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

                    <p>Projetos Entregues</p>
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

                    <p>Projetos Parados</p>
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

                    <p>Projetos Atrasados</p>
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
                    {{Session::get('message')}}
                </div>
            </div>
        </div>
    @endif

    <!-- Inicio Clientes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Projetos</h3>
                    <a href="{{'projetos/novo'}}" class="btn btn-sm btn-info btn-flat pull-right">Adicionar Projeto</a>

                </div>
                <!-- /.box-header -->
                <div class="box">
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped dataTable" cellspacing="0" width="100%">
                <thead class="bg-secondary" >
                <tr>
                    <th>Id</th>
                    <th>Projeto</th>
                    <th>Cliente</th>
                    <th>Data início</th>
                    <th>Data Fim</th>
                    <th>Novo Prazo</th>
                    <th>Status</th>
                    <th>Etapa</th>
                    <th></th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Projeto</th>
                    <th>Cliente</th>
                    <th>Data início</th>
                    <th>Data Fim</th>
                    <th>Novo Prazo</th>
                    <th>Status</th>
                    <th>Etapa</th>
                    <th></th>
                    <th>Ações</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($projetos) > 0)
                    @foreach($projetos as $projeto)

                        <tr>
                            <td scope="row">{{$projeto->id}}</td>
                            <td>{{$projeto->nome}}</td>
                            <td>
                                @if($projeto->clientes != "")
                                    {{$projeto->clientes->empresa}}
                                @else
                                    Sem Cliente
                                @endif
                            </td>
                            <td>
                                {{date('d/m/Y', strtotime($projeto->dataInicioContrato))}}
                            </td>
                            <td>{{date('d/m/Y', strtotime($projeto->dataFimContrato))}}</td>
                            <td> @if ($projeto->novo_prazo_acordado != '')
                                    {{date('d/m/Y', strtotime($projeto->novo_prazo_acordado))}}
                                 @else
                                   -
                                 @endif
                            </td>
                            <td>{{$projeto->status}}</td>
                            <td>{{$projeto->etapa_dev}}</td>
                            <td><?php
                                    if ($projeto->novo_prazo_acordado != ''){
                                            $dataAtual = date('d-m-Y'); //Convertendo a data p calcular
                                            $dataNovoP = date('d-m-Y', strtotime($projeto->novo_prazo_acordado)); //Convertendo a data p calcular
                                                $date1=date_create($dataAtual);
                                                $date2=date_create($dataNovoP);
                                                $diff=date_diff($date1,$date2);
                                                $result = $diff->format("%R%a dia(s)");
                                                if($result > 15 and $result < 35){ //Mostrando a criticidade de acordo com o prazo
                                                    echo '<small class="label label-warning"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }elseif ($result > 35){
                                                    echo '<small class="label label-success"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }elseif ($result < 15){
                                                    echo '<small class="label label-danger"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }

                                        }else{
                                            $dataAtual = date('d-m-Y'); //Convertendo a data p calcular
                                            $dataFim = date('d-m-Y', strtotime($projeto->dataFimContrato)); //Convertendo a data p calcular
                                                $date1=date_create($dataAtual);
                                                $date2=date_create($dataFim);
                                                $diff=date_diff($date1,$date2);
                                                $result = $diff->format("%R%a dia(s)");
                                                if($result > 15 and $result < 35){ //Mostrando a criticidade de acordo com o prazo
                                                    echo '<small class="label label-warning"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }elseif ($result > 35){
                                                    echo '<small class="label label-success"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }elseif ($result < 15){
                                                    echo '<small class="label label-danger"><i class="fa fa-clock-o"></i> '.$result.'</small>';
                                                }
                                    }
                                ?>

                            </td>
                            <td><a href="{{ url("/projetos/$projeto->id/detalhe") }}" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                    |<a href="{{ url("/projetos/$projeto->id/editar") }}" >
                                        <i class="fa fa-pencil-square-o" aria-hidden="true">
                                        </i>
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
                    <a href="{{'projetos/novo'}}" class="btn btn-sm btn-info btn-flat pull-left">Adicionar Projeto</a>

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
