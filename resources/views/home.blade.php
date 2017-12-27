@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Olá, {{ Auth::user()->name }}</div>

                <div class="panel-body">
                   Seja bem-vindo(a), ao seu Dashboard Maior!
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-4 panel panel-default h-615 ">
        <div class="panel-heading ">To Do</div>
        <div class="panel-drag">
    <ul id="sortable1" class="connectedSortable"  >
        <li class="card mt-10" >
            <div class="card-body">
                <h4 class="card-title">Titulo</h4>
                <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                <span class="badge badge-danger">Danger</span>
                <span class="badge badge-dark">Airton <i class="fa fa-user" aria-hidden="true"></i></i></span>
                </p>
                <button type="button" class="btn btn-warning fr"><i class="fa fa-trash" aria-hidden="true"></i></button>

            </div>
        </li>

        <li class="card mt-10 "  >
            <div class="card-body">
                <h4 class="card-title">Titulo</h4>
                <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                <span class="badge badge-danger">Danger</span>
                </p>
                <a href="#" class="card-link ">Ver +</a>
                <a href="#" class="card-link fr">Baixar Anexo</a>

            </div>
        </li>

        <li class="card mt-10" >
            <div class="card-body">
                <h4 class="card-title">Titulo</h4>
                <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                <span class="badge badge-danger">Danger</span>
                </p>
                    <a href="#" class="card-link ">Ver +</a>
                    <a href="#" class="card-link fr">Baixar Anexo</a>

            </div>
        </li>
    </ul>
        </div>
    </div>

    <div class="row col-md-4 panel panel-default h-615 ml-30">
        <div class="panel-heading ">Doing</div>
        <div class="panel-drag">
            <ul id="sortable2" class="connectedSortable"  >
                <li class="card mt-10" >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>

                <li class="card mt-10 "  >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>

                <li class="card mt-10" >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="row col-md-4 panel panel-default h-615 ml-30">
        <div class="panel-heading ">Done</div>
        <div class="panel-drag">
            <ul id="sortable3" class="connectedSortable"  >
                <li class="card mt-10" >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>

                <li class="card mt-10 "  >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>

                <li class="card mt-10" >
                    <div class="card-body">
                        <h4 class="card-title">Titulo</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Cliente</h6>
                        <h5 class="card-subtitle mb-2 text-muted">21/12/2017</h5>
                        <span class="badge badge-primary">4 <i class="fa fa-comment-o" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">Danger</span>
                        </p>
                        <a href="#" class="card-link ">Ver +</a>
                        <a href="#" class="card-link fr">Baixar Anexo</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>



<script type="text/javascript">

    $( function() {
        $( "#sortable1, #sortable2, #sortable3" ).sortable({
            connectWith: ".connectedSortable"
        }).disableSelection();
    } );



</script>

@endsection
