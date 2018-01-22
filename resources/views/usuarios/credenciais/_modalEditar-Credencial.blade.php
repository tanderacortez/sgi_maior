<!-- Modal de edição de credenciais-->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Editar Credencial</h4>
</div>
<div class="modal-body">
    <div class="row">
        <input type="hidden" value="{{$credencial->id}}" name="id" />
        <div class="col-md-4">
            <label for="validationServer01">Nome:</label>
            <input type="text" id="validationServer01" class="form-control" value="{{$credencial->nome}}" name="nome" placeholder="Ex: Visitante" required>
        </div>
        <div class="col-md-8">
            <label for="validationServer01">Descrição:</label>
            <input type="text" id="validationServer01" class="form-control" name="descricao" value="{{$credencial->descricao}}"  placeholder="Ex: Acesso de users externos" required>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-outline">Salvar</button>
</div>
    <!-- /.modal-dialog -->
<!-- /.modal -->
<!-- Fim Modal de Credenciais -->