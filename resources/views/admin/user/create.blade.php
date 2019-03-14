@extends('layout_back')

@section('title')
    <h1>
        Enrengistrement d'un utilisateur
        <small>- Enrengistrement d'un utilisateur</small>
    </h1>
@stop

@section('content')
    {!! Form::open(['url' =>route('user.store'),'method' =>'post']) !!}

    {!! Form::label('nom', 'nom') !!}
    {!! Form::text('nom', 'nom',['class'=> 'form-control'] ) !!}

    {!! Form::label('prenom', 'prenom') !!}
    {!! Form::text('prenom', 'prenom',['class'=> 'form-control'] ) !!}

    {!! Form::label('email', 'email') !!}
    {!! Form::text('email', 'email',['class'=> 'form-control'] ) !!}

    {!! Form::label('telephone', 'telephone') !!}
    {!! Form::text('telephone', 'telephone',['class'=> 'form-control'] ) !!}

    {!! Form::label('password', 'password') !!}
    <input id="password" type="password" class="form-control" name="password" value="" >

    {!! Form::label('commentaire', 'commentaire') !!}
    {!! Form::textarea('commentaire', 'commentaire', ['class'=> 'form-control', 'rows' => "3"] ) !!}

    <div class="form-group{{ $errors->has('est_joueur') ? ' has-error' : '' }}">
        <label for="joueur" class="col-md-4 control-label">Est-il un joueur?</label>

        <div class="checkbox">
            <input data-toggle="toggle" type="checkbox"  data-onstyle="success" name="est_joueur" >

            @if ($errors->has('est_joueur'))
                <span class="help-block">
                    <strong>{{ $errors->first('est_joueur') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('est_admin') ? ' has-error' : '' }}">
        <label for="est_admin" class="col-md-4 control-label">Est-il un administrateur?</label>

        <div class="checkbox">
            <input data-toggle="toggle" type="checkbox"   data-onstyle="success" name="est_admin" >

            @if ($errors->has('est_admin'))
                <span class="help-block">
                    <strong>{{ $errors->first('est_admin') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('est_arbitre') ? ' has-error' : '' }}">
        <label for="arbitre" class="col-md-4 control-label">Est-il un arbitre?</label>

        <div class="checkbox">
            <input data-toggle="toggle" type="checkbox"   data-onstyle="success" name="est_arbitre" >

            @if ($errors->has('est_arbitre'))
                <span class="help-block">
                    <strong>{{ $errors->first('est_arbitre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {!! Form::submit('Valider', ['class'=> 'btn btn-info']) !!}
    {!! Form::close()!!}
@endsection
