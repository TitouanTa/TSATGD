@extends('layout_back')

@section('title')
<h1>
    Modifier un statut de comité
    <small>- Changez le nom ou l'ordre. 1 = premier</small>
</h1>
@stop

@section('content')


<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <div class="contenu">
            <div class="box box-info">
                {!! Form::open(['route' => ['comite.update', $comite["id"]], 'method' => 'put']) !!}
                <div class="box-header">
                    <h3 class="box-title">  </h3>

                    <div class="form-group">
                        <label>Statut :  </label>
                        <input class="form-control" value="{{ $comite->statut }}" name="statut">
                    </div>
                    <div class="form-group">
                        <label>Ordre :  </label>
                        <input type="number" class="form-control" value="{{ $comite->ordre }}" name="ordre">
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                </div>

                <button type="submit" class="btn btn-success btn-lg btn-block">Modifier</button>

                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div> <!-- contenu -->
    </div>
</div>

@stop
