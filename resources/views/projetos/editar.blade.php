@extends('layouts.app-admin')
@section('content')

    <div class="container">

        <div class="row mb-2">
            <p class="h2">Editar Projeto</p>
        </div>

        <div class="row  panel panel-default"  >

            <div class="container-fluid mt-4 bg-light" >
                <form action="{{url('/projetos/update')}}"  method="post" style="padding: 34px 22px 85px 29px;">
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <input type="hidden" name="id" value="{{$projeto->id}}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Nome</label>
                            <input type="text" class="form-control " value="{{$projeto->nome}}" id="validationServer01" name="nome" placeholder="Nome"  required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Cliente</label>
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
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="validationServer03">Data Início Contrato</label>
                            <input type="text" class="form-control" id="validationServer03" value="{{$projeto->dataInicioContrato}}" placeholder="Data Início" name="dataInicioContrato" required>
                            <!-- <div class="invalid-feedback">
                            Please provide a valid city.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="validationServer04">Data Fim Contrato</label>
                            <input type="text" class="form-control " id="validationServer04" value="{{$projeto->dataFimContrato}}" name="dataFimContrato" placeholder="Data Fim Contrato" >
                            <!-- <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="validationServer04">Novo prazo acordado</label>
                            <input type="text" class="form-control datepicker" id="validationServer04" value="{{$projeto->novo_prazo_acordado}}" name="novo_prazo_acordado" placeholder="Novo Prazo">
                            <!--  <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer05">Status</label>
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
                        <div class="col-md-3 mb-3">
                            <label for="validationServer07">Etapa</label>
                            <select class="form-control mr-2" id="validationServer07" name="etapa_dev" required>
                                <option value="">Sel. a etapa</option>
                                <option value="Planejamento" @if($projeto->etapa_dev =="Planejamento") selected @endif>Planejamento</option>
                                <option value="Desenvolvimento" @if($projeto->etapa_dev =="Desenvolvimento") selected @endif>Desenvolvimento</option>
                                <option value="Validação Interna" @if($projeto->etapa_dev =="Validação Interna") selected @endif>Validação Interna</option>
                                <option value="Validação com o Cliente" @if($projeto->etapa_dev =="Validação com o Cliente") selected @endif>Validação com o Cliente</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer08">Nível de Criticidade</label>
                            <select class="form-control mr-2" id="validationServer08" name="nivel_criticidade" required>
                                <option value="">Selecione..</option>
                                <option value="Baixo" @if($projeto->nivel_criticidade =="Baixo") selected @endif>Baixo</option>
                                <option value="Medio" @if($projeto->nivel_criticidade =="Medio") selected @endif>Médio</option>
                                <option value="Alto" @if($projeto->nivel_criticidade =="Alto") selected @endif>Alto</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer08">Recorrência</label>
                            <select class="form-control mr-2" id="validationServer08" name="tipo_recorrencia" required>
                                <option value="">Selecione..</option>
                                <option value="Nenhuma" @if($projeto->tipo_recorrencia =="Nenhuma") selected @endif>Nenhuma</option>
                                <option value="Manutenção" @if($projeto->tipo_recorrencia =="Manutenção") selected @endif>Manutenção</option>
                                <option value="Implementação" @if($projeto->tipo_recorrencia =="Implementação") selected @endif>Implementação</option>
                                <option value="Manutenção/Implementação" @if($projeto->tipo_recorrencia =="Manutenção/Implementação") selected @endif>Manutenção/Implementação</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer09">Observações</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" value="{{$projeto->observacao}}" name="obs" rows="3"></textarea>
                            <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                        </div>
                    </div>
                    <button class="mt-3 btn btn-primary float-right" type="submit"> Salvar </button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //$(document).ready(function(){
        //    $( ".datepicker" ).datepicker();
        //});
    </script>
@endsection
