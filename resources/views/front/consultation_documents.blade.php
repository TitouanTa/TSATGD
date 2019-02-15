@extends("template")

@section("tittle")
Espace membre
@stop

@section("content")

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