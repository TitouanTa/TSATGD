@extends("template")

@section("tittle")
Espace membre
@stop

@section("content")
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
      <h2>Album : <b></b></h2><br />
    </div>
    @php($x = 0)

    <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-3 pointer">
      <div class="overlay-image">
        <img src="" class="img-responsive" style="height: 265px; width:265px;">
        <div class="hover" id="image{{$x}}" data-toggle="modal" data-target="#imagemodal{{$x}}">
        <div class="text">
          <span class="ti-fullscreen"></span>
        </div>  
      </div>
  </div>
</div>


<div class="feature-center animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
						
		<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2>Consultation des documents</h2>
		</div>
			  <div class="row">
          <div class="text-center col-md-12">
              <table>
                <thead class="panel-body">
                  <tr>
                    <th>&nbsp</th>
                    <th style="text">Titre</th>
                    <th style="text">Fichier</th>
                  </tr>

                </thead>
              <tbody>
              @foreach ($tab_docs as $unDoc)
                <tr>
                <td>
                  <span class="icon">
							      <i class="ti-ruler-pencil"></i>
						      </span>
                </td>
                <td class="panel-body">
                    {{ $unDoc["titre"] }}
                </td>
                <td class="panel-body" >
                    <a href="{{ url('doc/') ."/". $unDoc["contenu"] }}" target="_blank" >{{ $unDoc["contenu"]}}</a> 
                </td>
                </tr>
              @endforeach
              </tbody>
          </table>
          </div>
          </div>
			</div>
	</div>

@stop