<!-- CONTEUDO DO MODAL DETALHES - DA LISTAGEM DE CLIENTES-->

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{$cliente->empresa}}</h4>
        <small>Responsável: {{$cliente->nome_resp}}

        </small>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <label> E-mail:</label>
                <p>{{$cliente->email}}</p>
            </div>
            <div class="col-md-4">
                <label> Telefone/Celular:</label>
                <p>{{$cliente->dddcel}} {{$cliente->celular}}</p>
            </div>

            <div class="col-md-8">
                <label>Status de Relacionamento:</label>
                <p>{{$cliente->status_relacionamento}}</p>
            </div>
            <div class="col-md-4">
                <label>Atendimento:</label>
                <p>{{$cliente->atendimento}}</p>
            </div>

            <div class="col-md-12">
                <label>Observação:</label>
                <p>{{$cliente->obs}}</p>
            </div>


        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
        <a href="{{ url("/clientes/$cliente->id/editar") }}" type="submit" class="btn btn-info">Editar</a>
    </div>
<!-- /.modal-content -->