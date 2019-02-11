@extends("template")

@section("tittle")
{{ $contenu->titre }}
@stop
@section("sous_menu")
<div class="row menu-hidden" id="sous-menu">
  <div class="col-md-4 col-sm-5">
    <div class="feature-center animate-box" data-animate-effect="fadeIn">
      <a href="#{{ $contenu->sousmenus[0]->slug }}" ><span class="icon iconMyStyle">
          <i class=" ti-mobile"></i></span>
          <h3 class="h3Menu">{{ $contenu->sousmenus[0]->titre }}</h3>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-sm-5">
    <div class="feature-center animate-box" data-animate-effect="fadeIn">
      <a href="#{{ $contenu->sousmenus[1]->slug }}"><span class="icon iconMyStyle">
       <i class=" ti-comment-alt"></i></span>
      <h3 class="h3Menu">{{ $contenu->sousmenus[1]->titre }}</h3></a>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-sm-5">
    <div class="feature-center animate-box" data-animate-effect="fadeIn">
      <a href="#{{ $contenu->sousmenus[2]->slug }}"><span class="icon iconMyStyle">
       <i class="ti-map-alt"></i></span>
      <h3 class="h3Menu">{{ $contenu->sousmenus[2]->titre }}</h3>
      </a>
    </div>
  </div>
@stop

@section("content")

    <div id="{{ $contenu->sousmenus[0]->slug }}" class="gtco-section-first">
        <div id="gtco-portfolio">
            <div class="gtco-container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2 text-justify gtco-heading animate-box">
               <h2 class="text-center">{{ $contenu->sousmenus[0]->titre }}</h2>
               {!! $contenu->sousmenus[0]->contenu !!}
              </div>
          </div>
            </div>
        </div>
      </div>
      <div id="{{ $contenu->sousmenus[1]->slug }}" class="gtco-section-first">
        <div id="gtco-counter" >
          <div class="gtco-container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-justify gtco-heading animate-box">
               <h2 class="text-center">{{ $contenu->sousmenus[1]->titre }}</h2>
                <div class="row">
              <div class="col-md-8 col-md-offset-2 text-justify gtco-heading animate-box">
             
                  {!! Form::open(['route' => 'message.send']) !!}
                    <div class="form-group">
                      <label for="nom">Auteur :</label>
                  {!! Form::text('auteur', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="telephone">Téléphone :</label>
                  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                      <label for="mail">Adresse e-mail :</label>
                  {!! Form::email('mail', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                   <div class="form-group">
                     <label for="contenu">Message</label>
                  {{ Form::textarea('contenu', null, ['class' => 'form-control', 'rows' => "3"]) }}
                   </div>
                  {{ Form::submit('Envoyer le message', ['class' => 'btn btn-block btn-default btn-lg']) }}
                  {!! Form::close() !!}
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="{{ $contenu->sousmenus[2]->slug }}" class="gtco-section-first">
        <div id="gtco-products">
          <div class="gtco-container">
           <div class="row">
              <div class="col-md-8 col-md-offset-2 text-justify gtco-heading animate-box">
               <h2 class="text-center">{{ $contenu->sousmenus[2]->titre }}</h2>
                <div style="width: 700px; height: 500px;">
                	 {!! Mapper::render() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
@stop

@section("script")
 $('#sous-menu a').on('click', function(evt) {

// bloquer le comportement par défaut: on ne rechargera pas la page
       evt.preventDefault();
       // enregistre la valeur de l'attribut  href dans la variable target
	var target = $(this).attr('href');
       /* le sélecteur $(html, body) permet de corriger un bug sur chrome
       et safari (webkit) */
	$('html, body')
       // on arrête toutes les animations en cours
       .stop()
       /* on fait maintenant l'animation vers le haut (scrollTop) vers
        notre ancre target */
       .animate({scrollTop: $(target).offset().top}, 800 );
    });
 @stop
