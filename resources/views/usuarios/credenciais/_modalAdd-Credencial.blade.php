<!-- CONTEUDO DO MODAL CREDENCIAL - DA LISTAGEM DE USUÁRIOS -->
<form action="{{ route('usuarios.store_credencial', $user->id)}}"  method="post" role="form">
{{ csrf_field() }} <!--chave de segurança, tem que ter em todos os forms-->
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Adicionar Credencial para: {{$user->name}}</h4>
        <small>Permissão atual:
            <?php

            if(count($user->roles) > 0){
                echo ' <em>'.$user->roles[0]->nome. '</em>';
            }else{

                echo ' <em>não tem</em>';
            }
            // echo 'ué'. $user->roles[0]->nome;

            ?>
        </small>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label> Selecione abaixo:</label>
                <select class="form-control" name="credencial_id">
                    <option value="">Selecione..</option>
                   <?php
                        foreach($credenciais as $role_result){
                            if(count($user->roles)> 0){
                                    if ($user->roles[0]->id == $role_result->id){
                                        $selected = 'selected';
                                    }else{
                                        $selected='';
                                    }
                            }else{
                                        $selected='';
                            }
                            ?>
                           <option value="{{$role_result->id}}" {{$selected}}>{{$role_result->nome}}</option>
                    <?php
                        }
                    ?>
                </select>

            </div>
        </div>
        </p>
        <div class="row small">
            <div class="col-md-12">
                <h5><em>Legenda:</em> </h5>
                <table class="table ">
                    <thead>
                    <tr>
                        <th><em>Id</em></th>
                        <th><em>Nome</em></th>
                        <th><em>Descrição</em></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($credenciais as $role_result)
                        <tr>
                            <td>{{$role_result->id}}</td>
                            <td>{{$role_result->nome}}</td>
                            <td><?php $i = 1;
                                $auxPermission = "";
                                foreach($role_result->permissions as $permission_results){
                                    if($i == 4){
                                        //echo '>>'. $i;
                                        $auxPermission = $auxPermission . $permission_results->nome . '</br> ' ;
                                        $i=1;
                                    }else{
                                        $auxPermission = $auxPermission . $permission_results->nome . ' |' ;
                                    }
                                    $i= $i+1;
                                }
                                //echo $auxPermission;
                                echo substr($auxPermission,0,-1);
                                ?></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-outline">Salvar</button>
    </div>
</form>
<!-- /.modal-content -->