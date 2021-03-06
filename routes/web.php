<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@accueil');
Auth::routes();

// #### ROUTES DU FRONT ####
Route::get('accueil','PagesController@accueil')->name("accueil");
Route::get('club','PagesController@club')->name("club");
Route::get('info-pratique','PagesController@infoPratique')->name("info-pratique");
Route::get('enseignement','PagesController@enseignement')->name("enseignement");
Route::get('competition','PagesController@competition')->name("competition");
Route::get('contact','PagesController@contact')->name("contact");
Route::post('store-devenir-membre', 'PagesController@storeFront')->name('membre.store');
Route::post('message-envoyer', 'MessageController@send')->name('message.send');
Route::get('consultation-documents','DocumentController@visu')->name('consultation-documents');

//Affichage de l'album au clic sur la miniature dans galerie
Route::get('galerie/{album}/{titreAlbum}','PagesController@album')->name('galerie.album');

Route::get('liens_utiles','FrontController@liens_utiles')->name("liens_utiles");
Route::get('galerie','PagesController@galerie')->name("galerie");
Route::get('showGalerie','PagesController@showGalerie')->name("showGalerie");

Route::resource('commentaire', 'CommentaireController');
Route::get('commentaire/createCommentaire/{id}', 'CommentaireController@createCommentaire')->name('commentaire.createCommentaire')->where('id', '[0-9]+');
Route::get('commentaire/indexCommentaire/{id}', 'CommentaireController@indexCommentaire')->name('commentaire.indexCommentaire')->where('id', '[0-9]+');

// #### FIN ROUTE DU FRONT ####

// #### Routes pour le Back-office ####
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {

    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');

    Route::get('/', function () {
                return view('admin.page.dashboard');
            })
            ->name('admin.dashboard');
    Route::get('dashboard', function () {
        route('admin.dashboard');
    });

    //FileManager El-finder
    Route::get('el-finder' , '\Barryvdh\Elfinder\ElfinderController@showConnector')->name('el-finder');

    // Galerie
    Route::get('photo/create/{album_id}', 'PhotoController@create')->name('photo.create')->where('album_id', '[0-9]+');
    Route::post('photo', 'PhotoController@store')->name('photo.store');
    Route::get('photo/banque', 'PhotoController@banque')->name('photo.banque');
    Route::delete('photo/{id}', 'PhotoController@destroy')->name('photo.destroy')->where('id', '[0-9]+');
    //Route::resource('photo', 'PhotoController');
    Route::resource('album', 'AlbumController');
    Route::resource('partenaire', 'PartenaireController');

    // Utilisateurs / Profil
    //
    Route::resource('user', 'UserController');

    Route::post('info-pratique','UserController@storeFront')->name("user.storeFront");

    // Documents
    //
    Route::resource('document','DocumentController');

    // Articles
    //
    Route::resource('news', 'NewsController');

    //CommentaireController
    //
    Route::delete('commentaire/deleteCommentaire/{id}', 'CommentaireController@deleteCommentaire')->name('deleteCommentaire')->where('id', '[0-9]+');

    // Tournois
    //
    Route::resource('tournoi', 'TournoiController');
    // Equipes et Rencontres
    //
    Route::resource('equipe', 'EquipeController');
    Route::resource('rencontre', 'RencontreController');
    Route::get('rencontre/index/{id}', 'RencontreController@index')->name('rencontre.index')->where('id', '[0-9]+');
    Route::get('rencontre/createR/{id}', 'RencontreController@createR')->name('rencontre.createR')->where('id', '[0-9]+');
    Route::get('rencontre/convoquer/{id}', 'RencontreController@convoquer')->name('rencontre.convoquer')->where('id', '[0-9]+');
    Route::post('rencontre/convoquerstore/{id}', 'RencontreController@convoquerstore')->name('rencontre.convoquerstore');

    // Coordonnees
    // ça c'est à moitié fait enfin j'crois...
    Route::resource('comite', 'ComiteController');
    
    Route::get('comite/addUser/{id}', 'ComiteController@addUser')->name('comite.add_user');
    Route::get('comite/deleteUserStatut/{id}', 'ComiteController@deleteUserStatut')->name('comite.delete_user_statut');
    Route::put('comite/addUserStatut/{id}', 'ComiteController@addUserStatut')->name('comite.add_user_statut');
    Route::delete('comite/deleteStatut/{id}', 'Comite@deleteStatut')->name('deleteStatut');

    // Menu
    //
    Route::resource('contenu', 'ContenuController');
    Route::get('contenu/edit/{id_page}', 'ContenuController@edit')->name('contenu.edit');

    // Message
    //
    Route::resource('message', 'MessageController');

// #### FIN ROUTES BACK OFFICE ####
});
