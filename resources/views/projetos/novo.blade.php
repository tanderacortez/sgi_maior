@extends('layouts.app-admin')
@section('content')

    <div class="container">

        <div class="row mb-2">
            <p class="h2">Adicionar Projeto</p>
        </div>

        <div class="row  panel panel-default"  >

            <div class="container-fluid mt-4 bg-light" >
                <form action="{{url('/projetos/store')}}"  method="post" style="padding: 34px 22px 85px 29px;">
                {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Nome</label>
                            <input type="text" class="form-control " id="validationServer01" name="nome" placeholder="Nome"  required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Cliente</label>
                            <select class="form-control mr-2" id="validationServer07" name="id_cliente" required>
                                <option value="">Sel. o cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->empresa}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="validationServer03">Data Início Contrato</label>
                            <input type="text" class="form-control" id="validationServer03" placeholder="Data Início" name="dataInicioContrato" required>
                            <!-- <div class="invalid-feedback">
                            Please provide a valid city.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="validationServer04">Data Fim Contrato</label>
                            <input type="text" class="form-control " id="validationServer04" name="dataFimContrato" placeholder="Data Fim Contrato" >
                            <!-- <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="validationServer04">Novo prazo acordado</label>
                            <input type="text" class="form-control datepicker" id="validationServer04" name="novo_prazo_acordado" placeholder="Novo Prazo">
                            <!--  <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>-->
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer05">Status</label>
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
                        <div class="col-md-3 mb-3">
                            <label for="validationServer07">Etapa</label>
                            <select class="form-control mr-2" id="validationServer07" name="etapa_dev" required>
                                <option value="">Sel. a etapa</option>
                                <option value="Planejamento">Planejamento</option>
                                <option value="Desenvolvimento">Desenvolvimento</option>
                                <option value="Validação Interna">Validação Interna</option>
                                <option value="Validação com o Cliente">Validação com o Cliente</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer08">Nível de Criticidade</label>
                            <select class="form-control mr-2" id="validationServer08" name="nivel_criticidade" required>
                                <option value="">Selecione..</option>
                                <option value="Baixo">Baixo</option>
                                <option value="Medio">Médio</option>
                                <option value="Alto">Alto</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer08">Recorrência</label>
                            <select class="form-control mr-2" id="validationServer08" name="tipo_recorrencia" required>
                                <option value="">Selecione..</option>
                                <option value="Nenhuma">Nenhuma</option>
                                <option value="Manutenção">Manutenção</option>
                                <option value="Implementação">Implementação</option>
                                <option value="Manutenção/Implementação">Manutenção/Implementação</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer09">Observações</label>
                            <textarea class="form-control " id="exampleFormControlTextarea1" name="observacao" rows="3"></textarea>
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
