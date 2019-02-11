@extends("template")
@section("tittle")
  Galerie d'images
@stop
@if (isset($images))
  @section("sous_menu")
  <div>
    <h2 class="unlink retourAlbum"><a href="{{route('galerie')}}" class="unlink"><b class="ti-back-left"></b> Retour vers les albums</a><h2>
  </div>
  @stop
@endif
@section ('content')
<!-- QUAND ON A CLIQUE SUR UNE MINIATURE -->
@if (isset($images))
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
      <h2>Album : <b>{{$titreAlbum}}</b></h2><br />
    </div>
    @php($x = 0)
    @foreach ($images as $uneImage)
    <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-3 pointer">
      <div class="overlay-image">
        <img src="{{url('files/')."/".$uneImage}}" class="img-responsive" style="height: 265px; width:265px;">
        <div class="hover" id="image{{$x}}" data-toggle="modal" data-target="#imagemodal{{$x}}">
        <div class="text">
          <span class="ti-fullscreen"></span>
        </div>  
      </div>
  </div>
</div>
@php($x++)
@endforeach


<!-- FIN ON A CLIQUE SUR UNE MINIATURE -->
<!-- DEBUT MODALE AGRANDIR IMAGE -->
@php($x = 0)
@foreach($images as $uneImage)
  <div class="modal" tabindex="-1" role="dialog" id="imagemodal{{$x}}">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <img src="{{url('files/')."/".$uneImage}}" class="img-responsive" style="width: 100%;">
          <a class="left carousel-control" data-toggle="modal" data-dismiss="modal" data-target="#imagemodal{{$x-1}}">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" data-toggle="modal" data-dismiss="modal" data-target="#imagemodal{{$x+1}}">
            <span class="glyphicon glyphicon-chevron-right"><i class=""></i></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  @php($x++)
@endforeach
<!-- FIN MODALE AGRANDIR IMAGE -->
@endif
@if (isset($lesAlbums))
<!-- DEBUT  MINIATURE -->
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
      <h2>Albums</h2><br />
    </div>
    @foreach ($lesAlbums as $unAlbum)
    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 pointer">
      <div class="overlay-image">
        <img src="{{url('files/miniature.png')}}" class="img-responsive" style="height: 365px; width:365px;">
      <div class="normal">
        <div class="text">
          {{$unAlbum["titre"]}}
        </div>
      </div>
      <div class="hover">
      <div class="text">
      <a class="unlink" href="{{ route('galerie.album',['album' => $unAlbum["slug"], 'titreAlbum' => $unAlbum["titre"]]) }}">{{$unAlbum["titre"]}}</a>
      </div>  
    </div>
  </div>
</div>
<!-- FIN  MINIATURE -->
    @endforeach
  </div>
</div>
@endif
@stop
