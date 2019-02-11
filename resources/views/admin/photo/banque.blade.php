@extends('layout_back')

@section('title')
<h1>
    Banque d'images
    <small>- Ajoute des images dans la galerie. Insère les directement dans les albums pour les voir sur le site !</small>
</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"  src="{!! route('elfinder.index') !!}"></iframe>
        </div>     
    </div>

@stop