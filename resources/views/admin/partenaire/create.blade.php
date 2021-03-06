@extends('layout_back')

@section('title')
  <h1>Ajout d'un partenaire</h1>
@stop

@section('content')
<!-- FORMULAIRE DE CREATION D'UN PARTENAIRE -->
{!! Form::open(['route' => "partenaire.store",'files' => true, 'method' => 'post']) !!}
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label>Dénomination : </label>
      <input class="form-control" placeholder="Denomination partenaire" name="name">
    </div>
    <div class='form-group col-md-6'>
      <label>Description : </label>
      <input class="form-control" placeholder="Description du partenaire" name="description">
    </div>
  </div>

  <div class='form-group col-md-12'>
    <label>Adresse : </label>
    <input class="form-control" placeholder="Adresse postale" name="adresse">
  </div>

  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label>Ville : </label>
      <input class="form-control" placeholder="Ville" name="ville">
    </div>
    <div class='form-group col-md-6'>
      <label>Code postal : </label>
      <input class="form-control" placeholder="Code postal" name="cp">
    </div>
  </div>

  <div class="form-group col-md-12">
    <label>Téléphone : </label>
    <input class="form-control" placeholder="Telephone partenaire" name="tel">
  </div>

  <div class="form-row">
    <div class='form-group col-md-4'>
      <label>Lien du site : </label>
      <input class="form-control" placeholder="Lien du site partenaire" name="site">
    </div>
    <div class='form-group col-md-4'>
      <label>Lien page Facebook : </label>
      <input class="form-control" placeholder="Facebook partenaire" name="facebook">
    </div>
    <div class='form-group col-md-4'>
      <label>Lien Twitter : </label>
      <input class="form-control" placeholder="Twitter partenaire" name="twitter">
    </div>
  </div>

<!-- EL FINDER : file manager -->
<div class="row">
    <div class='form-group col-md-12'>
      <a href="" class="popup_selector" data-inputid="feature_image"><label for="feature_image">Choisir une image</label></a>
      <input type="text" id="feature_image" name="feature_image" value="">
    </div>
  </div>

  <button type="submit" class="btn btn-success">Créer</button>
  <button type="reset" class="btn btn-danger">Effacer le formulaire</button>
{!! Form::close() !!}

@stop
@section('script')
@stop
