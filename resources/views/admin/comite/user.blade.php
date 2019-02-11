@extends('layout_back')

@section('title')
<h1>
    Modifier les coordonnées
    <small>- Page de modification des coordonnées</small>
</h1>
@stop

@section('content')


<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <div class="contenu">
            <div class="box box-info">
                {!! Form::open(['route' => ['comite.add_user_statut', $comite->id], 'method' => 'put', 'files' => true]) !!}
                <div class="box-header">
                    <h3 class="box-title">{{ $comite->statut }}</h3>

                    <div class="form-group">
                        <label>Utilisateur :  </label>
                        {{ Form::select('user', $users, null, ['class' => 'form-control']) }}
                    </div>

                </div>


                <button type="submit" class="btn btn-success btn-lg btn-block">Modifier</button>

                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div> <!-- contenu -->
    </div>
</div>

@stop
