@extends('layout_back')

@section('title')
<h1>
    Administration des comités
    <small>- Créer, Modifier et supprimer des comités / Pour supprimer un comité, veuillez d'abord retirer tous les utilisateurs de ce comité.</small>
</h1>
@stop

@section('content')


<!-- Main content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                {!! Form::open(['route' => "comite.create", 'method' => 'get']) !!}
                <button type="submit" class="btn btn-success btn-lg btn-block">Créer un statut de comité</button>
                {!! Form::close() !!}
                <!-- /.box-header -->
                <div class="box-body">
                    
                    <!-- search form (Optional) -->
                    <form action="#" method="get">
                        <div class="input-group margin">
                            <input type="text" name="q" class="form-control" placeholder="Rechercher . . .">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-info btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th style="width: 10px">Ordre</th>
                                <th>Statut</th>
                                <th>Membres de ce rang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lesComites as $unComite)
                            <tr>
                                <td class="col-md-1">
                                    {{ $unComite["ordre"] }}
                                </td>
                                <td class="col-md-1">
                                    {{ $unComite["statut"] }}
                                </td>
                                <td class="col-md-4">
                                    @foreach($unComite->users as $unUser)
                                            <div class="chip">
                                                <b>{{ $unUser->nom }}</b> {{ $unUser->prenom }}
                                                <span class="closebtn"><a href="{{route('comite.delete_user_statut', ['id' => $unUser->id])}}">x</a></span>
                                            </div>
                                    @endforeach
                                </td>
                                <td class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            {!! Form::open(['route' => ["comite.edit", $unComite->id], 'method' => 'get']) !!}
                                            <button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-3">
                                            @if (count($unComite->users) > 0)
                                                &nbsp;
                                            @else
                                                {!! Form::open(['route' => ["comite.destroy", $unComite->id], 'method' => 'delete']) !!}
                                                <button type="submit" id="{{ $unComite->id }}" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                                {!! Form::close() !!}
                                            @endif
                                            
                                        </div>
                                       <div class="col-md-3">
                                            <a class="btn btn-primary btn-circle" href="{{ route("comite.add_user", $unComite->id) }}">Ajouter {{$unComite->statut}}</a>
                                        </div>         
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop