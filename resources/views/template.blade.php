<!DOCTYPE HTML>
<!--
Aesthetic by gettemplates.co
Twitter: http://twitter.com/gettemplateco
URL: http://gettemplates.co
-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Club TSAT GD
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->

	<!-- Animate.css -->

	<link rel="stylesheet" href="{{ asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->

	<link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('css/icontennis.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/MyStyle.css')}}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">

	<!-- Gallery  -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">                                      <!-- Bootstrap style -->
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">                                     <!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('css/templatemo-style.css')}}">                                   <!-- Templatemo style -->

	<!-- Modernizr JS -->
	<script src="{{ asset('js/modernizr-2.6.2.min.js')}}"></script>

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	@if (Session::has('error') || Session::has('errors'))
		<input type="hidden" value="1" id="checkModal">
	@else
		<input type="hidden" value="0" id="checkModal">
	@endif
	@php ($connexionStatut = "Se connecter")
	<!-- PERMET DE CHANGER LE BOUTON SE CONNECTER EN NOM + PRENOM -->
	@if (Auth::check()) <!-- SI le user est connecté on change l'id pour la modal de profil -->
		<!-- Définition des infos utilisateur pour modal profil -->
		@php ($identifiant = "profil")
		@php ($connexionStatut = Auth::user()->nom ." ". Auth::user()->prenom)
	@else <!-- Si il est déconnecté, on change l'id pour la modal de connexion -->
		@php ($identifiant = "login")
	@endif
	<div class="gtco-loader"></div>

	<div id="page">

		<!-- Si utilisateur est admin, on lui affiche le lien du back office -->
		@php ($statutAfficher = "hidden")
		@if (Auth::check())
			@if (Auth::user()->est_admin == 1)
				@php ($statutAfficher = "visible")
			@endif
		@endif
		<nav id="div_nav" class="gtco-nav" role="navigation">
			<div class="row">

				<div class="row">
					<div class="col-md-12 text-right gtco-contact">
						<ul class="">
							<li><a id="{{$identifiant}}" href="#">{{$connexionStatut}} <i class="ti-user"></i></a></li>
							<li><a href="http://twitter.com/gettemplatesco"><i class="ti-twitter-alt"></i> </a></li>
							<li><a href="{{route('contact')}}"><i class="icon-mail2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<img id="logo" src="{{ url('images/logo_png.png')}}" alt="logo transparent" height="300" width="300"  >
					</div>
					<div class="col-sm-10  col-xs-10 text-right menu-1">
						<ul>
							<li class="{{Request::is('accueil') || Request::is('/')?'active':null}}">
								<a id="li_menu0" href="{{route('accueil')}}">Accueil</a>
							</li>
							<li class="has-dropdown {{Request::is('club')?'active':null}}">
								<a  id="li_menu1" href="{{route('club')}}">Club</a>
								<ul class="dropdown">
									<li><a href="{{route('club')}}#historique">Historique</a></li>
									<li><a href="{{route('club')}}#comite">Comité</a></li>
									<li><a href="{{route('club')}}#installations">Installations</a></li>
									<li><a href="{{route('club')}}#partenaires">Partenaires</a></li>
								</ul>
							</li>
							<li class="has-dropdown {{Request::is('competition')?'active':null}}">
								<a id="li_menu2" href="{{route('competition')}}">Compétitions</a>
								<ul class="dropdown">
									<li><a href="{{route('competition')}}#tournoi">Tournois</a></li>
									<li><a href="{{route('competition')}}#equipe">Equipes (à venir)</a></li>
									<li><a href="{{route('competition')}}#arbitres">Arbitres (à venir)</a></li>
									<li><a href="{{route('competition')}}#resultats">Résultats (à venir)</a></li>
								</ul>
							</li>
							<li class="has-dropdown {{Request::is('info-pratique')?'active':null}}">
								<a id="li_menu3"  href="{{route('info-pratique')}}">Infos Pratiques</a>
								<ul class="dropdown">
									<li><a href="{{route('info-pratique')}}#horaires">Horaires</a></li>
									<li><a href="{{route('info-pratique')}}#devenir-membre">Devenir Membre</a></li>
									<li><a href="{{route('info-pratique')}}#reservations">Réservation</a></li>
									<li><a href="{{route('info-pratique')}}#tarifs">Tarifs</a></li>
								</ul>
							</li>
							<li class="has-dropdown {{Request::is('enseignement')?'active':null}}">
								<a id="li_menu4" href="{{route('enseignement')}}">L'enseignement</a>
								<ul class="dropdown">
									<li><a href="{{route('enseignement')}}#l-equipe-pedagogique">Equipe pédagogique</a></li>
									<li><a href="{{route('enseignement')}}#l-ecole-de-tennis">Ecole de tennis</a></li>
									<li><a href="{{route('enseignement')}}#cours-colectifs">Cours collectifs</a></li>
									<li><a href="{{route('enseignement')}}#les-stages">Stages</a></li>
								</ul>
							</li>
                            <li class="{{Request::is('galerie')?'active':null}}">
								<a id="li_menu5" href="{{route('galerie')}}">Galerie</a>
							</li>
							<li class="{{Request::is('accueil')?'active':null}}">
								<a id="li_menu6" href="{{route('accueil')}}">Liens utiles (à venir)</a>
							</li>
							<li class="has-dropdown {{Request::is('contact')?'active':null}}">
								<a id="li_menu7" href="{{route('contact')}}">Contact</a>
								<ul class="dropdown">
									<li><a  href="{{route('contact')}}#coordonnees">Coordonnées</a></li>
										<li><a  href="{{route('contact')}}#contacter">Nous contacter</a></li>
										<li><a  href="{{route('contact')}}#plan">Plan d'accès</a></li> 
								</ul>
							</li>
							
						</ul>    
					</div>
				</div>
			</div>
			<div class="animate-box  col-md-6">
				<h1 id="titre_sous_logo" class="animate-box" data-animate-effect="fadeInUp" >
					<span style="background:#d2007b63; padding-left:10px ; padding-right:10px">
					@section("tittle")
						Pratiquez le tennis!
					@show
					</span>
				</h1>
			</div>
		</nav>

		<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url({{url('images/tennis3.jpg')}});">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						<div class="display-t">
							<div class="display-tc">
								<div id="gtco-features" class="gtco-features-3">
									@yield("carousel")
									<div id="menu">
										<div class="gtco-container ">
											<div class="row">
											</div> 
											@yield("sous_menu")
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div class="row">
		@yield("content")
	</div>
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Créateurs</h3>
						<p>
							- <a href="javascript:void(0)" id="kb" data-toggle="tooltip" data-placement="top" title="bataille.kevin06@gmail.com">BATAILLE Kevin</a>, apprenti Administrateur de Systèmes Informatiques : <a href="javascript:void(0)" id="vprec" data-toggle="tooltip" data-placement="top" title="PERRIGUEY Adrien, BUFFARD Hugo, CAVIN Elodie, DUMONT Alexandre, CHAMBELLAND Kevin">Version précédente</a>.
							<br />- PERNELLE Sébastien
							<br />
						</p>
					</div>
				</div>

				<div class="col-md-4 co Adrl-md-push-1">
					<div class="gtco-widget">
						<h3>Liens utiles</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Site de la FFT</a></li>
							<li><a href="#">Tennis wikipedia</a></li>
							<li><a href="#">Ancien site</a></li>
							<li><a href="#">Mentions légales</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Au cas où</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-mail2"></i> tsatgd@gmail.com</a></li>
						</ul>
					</div>
				</div>



			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>

	</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- Modal de login -->
<div class="modal" id="modalLogin" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="loginClose">&times;</button>
				<h4><span class="ti-unlock">&nbsp;</span>Se connecter</h4>
			</div>
			<div class="modal-body">
				@if (Session::has('error'))
					<p class="alert alert-danger">{{ Session::get('error') }}</p>
				@endif
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">Adresse e-mail</label>
						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						{{ csrf_field() }}
						<label for="password" class="col-md-4 control-label">Mot de passe</label>
						<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<a class="btn btn_modal" id="oubliMdp" href="javascript:void(0)">
								Mot de passe oublié?
							</a>
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn_modal">
								Connexion
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- FIN Modal de login -->

<!-- Modal de PROFIL -->

@if (Auth::check())

	<div class="modal fade" id="modalProfil" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="profilClose" class="close">&times;</button>
					<h4><span class="ti-user">&nbsp;</span>Mon profil</h4>
				</div>
				<div class="row">
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-6">
								<label for="names"> Nom, prénom : </label>
								{{ Auth::user()->nom }} {{ Auth::user()->prenom }}
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label for="email"> Email : </label>
								{{ Auth::user()->email }}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-6">
								<label for="telephone"> Téléphone : </label>
								{{ Auth::user()->telephone}}
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-6">
								<a class="btn btn_modal" href="{{route('admin.dashboard')}}" style="visibility: {{$statutAfficher}}">Vers le mode administrateur</a>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								{!! Form::open(['route' => ['logout'], 'method' => 'post']) !!}
								<button type="submit" class="btn btn_modal">Déconnexion</button>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
<!-- FIN Modal de PROFIL -->
<!-- DEBUT Modal de Reset Password -->
<div class="modal fade" id="modalPassword" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Réinitialiser le mot de passe</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">Adresse e-mail</label>
						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Envoyer lien
							</button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Envoyer lien</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- FIN Modal de Reset Password -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{ asset('js/jquery.countTo.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/magnific-popup-options.js')}}"></script>

<!-- Gallery -->
<script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>          <!-- https://isotope.metafizzy.co/ -->
<script src="{{ asset('js/imagesloaded.pkgd.min.js')}}"></script>     <!-- https://imagesloaded.desandro.com/ -->
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script> <!-- http://dimsemenov.com/plugins/magnific-popup/ -->
<!-- <script src="{{ asset('js/parallax.min.js')}}"></script>  -->


<script src="{{ asset('js/main.js')}}"></script>

<script src="{{asset('js/lightbox.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('.js-scrollTo').on('click', function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 750; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
		return false;
	});
});
</script>

<!-- SCRIPT MODAL LOGIN -->
<!--Définit les variables du script pour la bonne modal -->
@php ($identifiant = "#login")
@php ($nom_modal = "#modalLogin")
@if (Auth::check())
	@php ($identifiant = "#profil")
	@php ($nom_modal = "#modalProfil")
@endif
<script>
$(document).ready(function(){

	if ($("#checkModal").val()==1){
		$("#modalLogin").modal();
	}


	$('{{$identifiant}}').click(function(){
		$('{{$nom_modal}}').modal();
	});

        $('{{$identifiant}}Close').click(function(){
		$('{{$nom_modal}}').modal('toggle');
	});

        $('#oubliMdp').click(function(){
		$('{{$nom_modal}}').modal('toggle');
		$('#modalPassword').modal('toggle');
	});
        
        $('.li_').click(function(){
		$('{{$nom_modal}}').modal('toggle');
	});
});
</script>

<script>
$('#vprec').tooltip()
$('#kb').tooltip()
@yield('script')
</script>
</body>
</html>
