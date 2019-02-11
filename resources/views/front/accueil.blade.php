@extends("template")
@section("carousel")
<!-- Début du carousel de partenaires -->
<div>
  <div class="col-md-3 col-md-offset-5 titrePartenaire">
    <h2>Nos partenaires</h2>
  </div>
  <div class="col-md-4">
    <div class="bs-example">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
        @php($x = 0)
        @foreach($tab_partenaires as $lePartenaire)
          @if($x == 0)
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          @else
            <li data-target="#myCarousel" data-slide-to="{{$x}}"></li>
          @endif
          @php($x++)
        @endforeach
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
        @php($j = 0)
          @foreach($tab_partenaires as $lePartenaire)
            @if($j == 0)
              <div class="item active">
                <img src="{{$lePartenaire->logo}}">
              </div>
            @else
              <div class="item">
                <img src="{{$lePartenaire->logo}}">
              </div>
            @endif
          @php($j++)
          @endforeach
        </div>
        <!-- Carousel controls 
        <a class="" href="#myCarousel" data-slide="prev">
          <span class="ti-angle-left"></span>
        </a>
        <a class="" href="#myCarousel" data-slide="next">
          <span class="ti-angle-right"></span>
        </a>
        -->
      </div>
    </div>
  </div>
</div>
  <!-- Fin du carousel de partenaires -->
  <br />
@stop
@section ('content')
<!-- AFFICHAGE 3 DERNIERES NEWS -->
<div class="box text-center">
  <div id="gtco-portfolio" class="gtco-section text-center">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading container gtco-container">
          <h2 class="text-center newsTitre">Nos derniers articles</h2>
          <div class="news  gtco-container text-center">
          @php($i=0)
          @foreach($tab_news as $laNews)
            @if($i<4)
              @if($i == 1 || $i == 2)
                @php($esp = "col-md-offset-1")
              @else
                @php($esp = "")
              @endif
              <a id="{{ $laNews->id }}" class="color-1 aUnlink"  data-toggle="modal" data-target="#modalNews{{$laNews->id}}">
                  <div class="text-center mybox col-md-3 {{$esp}} animate-box">
                    <h2 style="font-size: 17px;">{{ $laNews->titre }}</h2> <br />
                    <span>  {!!  str_limit(strip_tags($laNews->contenu) , 25 , '... Voir plus.') !!} </span> <br /><br />
                    @if($laNews->url != "")
                      <img src="{{$laNews->url}}" height="150" width="125"> 
                    @else
                      <br />
                    @endif
                  <br />
                  @if(auth::check())
                  <!-- EN FONCTION DU NB DE COMMENTAIRES QU ON A. ON NE PEUT LES VOIR QUE SI ON EST CONNECTES OK -->
                      @if($laNews->commentaires->count()==0)
                        <span>0 <b class="ti-comment"></b></span>
                      @elseif ($laNews->commentaires->count()==1)
                        <span>1 <b class="ti-comment"></b></span>
                      @else
                        <span>{!! $laNews->commentaires->count() !!} <b class="ti-comments"></b></span>
                      @endif
                  @endif
                </div>
              </a>
            @endif
          @php($i++)
          @endforeach 
          </div>
        </div>
      </div>
  </div>
</div>



      <!-- Modal de  news -->
      @php($i=0)
      @foreach($tab_news as $laNews)
        @if($i <4)
        <div class="modal fade bd-example-modal-lg" id="modalNews{{$laNews->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document" style="width:75%;">
            <div class="modal-content">
              <div id="gtco-portfolio" class="gtco-section">
                <div class="gtco-container">

                  <div class="row">

                    <div class="col-md-12 text-center gtco-heading animate-box">
                      <h2>{{ $laNews->titre }}</h2>
                      <span>{!! $laNews->contenu !!}</span>
                      @if(auth::check())
                        <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalCommentaire{{$laNews->id}}">Commenter</button>
                      @endif
                      3 derniers commentaires : 

                    </div>
                  </div>
                  @if(auth::check())
                  <div id="gtco-portfolio" class="gtco-section">
                        <div class="col-sm-8 col-sm-offset-2">
                          <!-- Boucle des commentaires, nous affichons que les 3 derniers, grâce à reverse. Franchement faudrait tous les afficher, mais moins gros etc...-->
                          @php($j = 0)
                            @forelse($laNews->commentaires->reverse() as $unCommentaire) <!-- AFFICHAGE DES COMMENTAIRES LIES A LA NEWS -->
                              @if($j < 3)
                                <div id="row{{$unCommentaire->id}}" class="panel panel-default" >
                                  <div class="panel-heading"><h2>{{$unCommentaire->titre}}, de <b><i>{!! $unCommentaire->pseudo !!}</i></b> </h2></div>
                                  <div class="panel-body">{!! $unCommentaire->contenu !!} {{$j}}</div>
                                </div>
                              @endif
                              @php($j++)
                              @empty
                                <span>Il n'y a pas de commentaire pour cette news</span>
                            @endforelse
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    @php($i++)
    @endforeach
    <!-- FIN Modal de news -->

        <!-- Modal de commentaire -->
        @if(auth::check())
      @foreach($tab_news as $laNews)
      <div class="modal fade bd-example-modal-lg" id="modalCommentaire{{$laNews->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width:100%;">
          <div class="modal-content">

            <!-- Main content -->
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                    {!! Form::open(['route' => "commentaire.store", 'method' => 'post', 'files' => true]) !!}
                      <div class="form-group">
                        <label>Titre du commentaire :  </label>
                        <input class="form-control" placeholder="Un titre" name="titre">
                      </div>
                      <div class="form-group">
                        {{ Form::textarea('editor', '',['id'=>'editor','class'=>'form-control','placeholder'=>'Votre commentaire']) }}
                      </div>

                    <button type="submit" class="btn btn-success btn-lg btn-block">Créer</button>
                    <input class="form-control" name="id_news" value="{{$laNews->id}}" style="visibility:hidden">
                    @if(Auth::check())
                      @php ($pseudo = Auth::user()->nom ." ". Auth::user()->prenom)
                      <input class="form-control" name="pseudo" value="{{$pseudo}}" style="visibility:hidden">
                    @else
                      @php ($pseudo = "ANONYME")
                      <input class="form-control" name="pseudo" value="{{$pseudo}}" style="visibility:hidden">
                    @endif
                    {!! Form::close() !!}
                  </div>
                  <!-- /.box -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    @endif
    <!-- FIN Modal de commentaire -->
  @stop