@extends('layout_back')

@section('title')
  <h1>
    Administration des albums
    <small>- Ici vous pouvez créer les dossiers de vos albums. Ensuite vous pouvez aller dans la banque d'image pour le remplir</small>
  </h1>
@stop

@section('content')


  <!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          {!! Form::open(['route' => "album.create", 'method' => 'get']) !!}
          <button type="submit" class="btn btn-success btn-lg btn-block">Ajouter</button>
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
                  <th>Titre de l'album</th>
                  <th>Afficher l'album</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lesAlbums as $unAlbum)
                  <tr>
                    <td class="col-md-3" id="td{{ $unAlbum->id }}">
                      {{ $unAlbum["titre"] }}
                    </td>
                    
                  <td class="col-md-1" id="td{{ $unAlbum->id }}">
                      <div class="checkbox">
                        <!--@if($unAlbum->actif == true)
                          <input checked data-toggle="toggle" type="checkbox" data-onstyle="success" name="actif" >
                        @else
                          <input data-toggle="toggle" type="checkbox" data-onstyle="false" name="actif" >
                        @endif-->
                        {!! Form::open(['route'=>['changeStatut',$unAlbum["id"]],"method"=>"put",'id'=>'changeStatut'.$unAlbum["id"] ]) !!}
                          @if ($unAlbum->actif == true)
                          <input checked data-toggle="toggle" type="checkbox" data-onstyle="success" name="actif" class="actif" id="{{ $unAlbum->id }}" >
                          @else
                          <input data-toggle="toggle" type="checkbox" data-onstyle="success" name="actif"  class="actif"  id="{{ $unAlbum->id }}">
                          @endif                
                        {!! Form::close() !!}
                      </div>
                    </td>
                    <td class="col-md-3">
                      <div class="row">
                        <div class="col-md-3">
                          {!! Form::open(['route' => ["album.edit", $unAlbum->id], 'method' => 'get']) !!}
                          <button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></button>
                          {!! Form::close() !!}
                        </div>
                        <div class="col-md-3">
                          {!! Form::open(['route' => ["album.destroy", $unAlbum->id], 'method' => 'delete', 'id' => "form".$unAlbum->id]) !!}
                          <button type="submit" id="{{ $unAlbum->id }}" class="btn btn-danger btn-circle jsDeleteButton"><i class="fa fa-times"></i></button>
                          {!! Form::close() !!}
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


@section('script')
<script>

 $(".actif").change(function(){
   $("#changeStatut"+$(this).attr('id')).submit();
  })

</script>

@stop