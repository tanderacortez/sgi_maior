@extends('layouts.app-admin')
@section('content')

    <div class="container">

        <div class="row mb-2">
            <p class="h2">Editar Cliente</p>
        </div>

        <div class="row  panel panel-default"  >

    <div class="container-fluid mt-4 bg-light" >
        <form action="{{url('/clientes/update')}}"  method="post" style="padding: 34px 22px 85px 29px;">
        {{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer02">Empresa</label>
                    <input type="text" class="form-control " value="{{$cliente->empresa}}"  id="validationServer02" placeholder="Empresa" name="empresa"  required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Responsável na empresa</label>
                    <input type="text" class="form-control " id="validationServer01" value="{{$cliente->nome_resp}}" name="nome_resp" placeholder="Nome"  >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer03">E-mail</label>
                    <input type="text" class="form-control" id="validationServer03"  value="{{$cliente->email}}" placeholder="E-mail" name="email" >
                    <!-- <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>-->
                </div>
                <div class="col-md-1 mb-3">
                    <label for="validationServer04">DDD</label>
                    <input type="text" class="form-control " id="validationServer04"  value="{{$cliente->dddcel}}" name="dddcel" placeholder="DDD" >
                    <!-- <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>-->
                </div>
                <div class="col-md-2 mb-3">
                    <label for="validationServer05">Celular</label>
                    <input type="text" class="form-control" id="validationServer05"  value="{{$cliente->celular}}" placeholder="Celular" name="celular" >
                    <!--<div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>-->
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer05">Status do relacionamento</label>
                    <select class="form-control mr-2" id="validationServer05" name="status_relacionamento" required>
                        <option value="Ótimo" @if($cliente->status_relacionamento =='Ótimo') selected @endif>Ótimo</option>
                        <option value="Estável"@if($cliente->status_relacionamento =='Estável') selected @endif>Estável</option>
                        <option value="Atenção" @if($cliente->status_relacionamento =='Atenção') selected @endif>Necessita Atenção</option>
                        <option value="Crítico" @if($cliente->status_relacionamento =='Crítico') selected @endif>Crítico</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer05">Atendimento</label>
                    <select class="form-control mr-2" id="validationServer05" name="atendimento" required>
                        <option value="Mariana Mel" @if($cliente->atendimento =='Mariana Mel') selected @endif>Mariana Mel</option>
                        <option value="Rebeca" @if($cliente->atendimento =='Rebeca') selected @endif>Rebeca Monteiro</option>
                        <option value="Tandera" @if($cliente->atendimento =='Tandera') selected @endif>Tandera Cortêz</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationServer06">Observações</label>
                    <textarea class="form-control " id="exampleFormControlTextarea1"  value="{{$cliente->obs}}" name="obs" rows="3"></textarea>
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
@endsection