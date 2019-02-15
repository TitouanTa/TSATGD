<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Accueil;
use App\Models\Partenaire;
use App\Models\Photo;
use App\Models\Album;
use App\Models\SousMenu;
use App\Models\Comite;
use App\Models\User;
use App\Models\Message;
use App\Models\Rencontre;
use App\Models\Menu;
use App\Models\Tournoi;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Storage;
use Mapper;



class PagesController extends Controller {

    public function accueil() {
         
      $tab_news = News::all()->sortByDesc("created_at")->take(3);
      $tab_partenaires = Partenaire::all();

      return view('front.accueil')
            ->with("tab_news", $tab_news)
            ->with("tab_partenaires",$tab_partenaires);
    }
    public function club() {
        $tab_partenaires = Partenaire::all();
        $tab_comites=Comite::with("users")->orderBy('ordre','asc')->get();
       $contenu=Menu::where("slug","club")->first();
        return view('front.club')->with("contenu",$contenu)->with("tab_partenaires",$tab_partenaires)
        ->with("tab_comites",$tab_comites);
    }
    public function competition() {
        $lesTournois=Tournoi::all();

        $contenu=Menu::where("slug","competition")->first();
        return view('front.competition')->with("contenu",$contenu)->with("lesTournois",$lesTournois);
    }
    public function infoPratique() {

        $contenu=Menu::where("slug","info-pratique")->first();

        return view('front.info_pratique')->with("contenu",$contenu);
    }
    public function enseignement() {

        $contenu=Menu::where("slug","enseignement")->first();
        return view('front.enseignement')->with("contenu",$contenu);
    }
    public function contact() {

        Mapper::map(47.051175, 5.413658, ['zoom' => 17]);

        $contenu=Menu::where("slug","contact")->first();
        return view('front.contact')->with("contenu",$contenu);
    }

    public function index() {
        $lesArticles = Article::all()->sortByDesc("created_at");

        return view('site.index')
                        ->with("tab_articles", $lesArticles);
    }
    public function storeFront(Request $request){
      User::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'password' => bcrypt($request->input('password')),
        'commentaire' => $request->input('commentaire'),
      ]);
      return redirect()->route("info-pratique");
      //Ajouter une alerte pour afficher l'envoi de la création de membre
    }

    /* function contact() {
        $leComite = Comite::with('Users')->get();
        return view('site.contact')->with("leComite", $leComite);
    }
    */
    function documentation() {
        return view('site.documentation');
    }

    function galerie() {
        $lesAlbums = Album::where('actif','1')->with('photos')->get();
        $files = Storage::disk('files')->allFiles('album');
        //cherche tous les dossiers sauf ceux qui sont inactif
        //On rappelle que un dossier = un album
        
        return view('front.galerie')->with("lesAlbums", $lesAlbums)->with('files',$files);
    }

    function album($album,$titreAlbum) {
        //dd($album);
        //$album = slug de l'album sur lequel on a cliqué
        //Si t'es pas doué : 
        //Slug = chaine dans laquelle il n'y a pas d'espaces, ni de caractères spéciaux pour écrire un titre genre : mon_dossier_new
        $images = Storage::disk('files')->allFiles('album/'.$album);

        return view('front.galerie')->with('images',$images)->with('titreAlbum',$titreAlbum);
    }

    function showGalerie($id) {

        $lesAlbums = Album::with('photos')->find($id);
       return view('site.showGalerie', compact('lesAlbums'));
    }

    function coordonnee() {
        $contenu = Contenu::where('page', "coordonnee")->get()->first();
        return view('site.coordonnee')->with("contenu", $contenu);
    }

    function profil() {
       $lesUsers = User::all();

        return view('site.profil')
                        ->with('tab_users', $lesUsers);
    }

    function editprofil($id) {
         $leUser = User::find($id);
        return view('site.profil.editmdp')
                        ->with("leUser", $leUser);
    }

    function convocation($id) {
         $leUser = User::find($id);
        return view('site.profil.convoc')
                        ->with("leUser", $leUser);
    }

     public function updateprofil(Request $request, $id) {
        $leUser = User::find($id);







        if ($request->get('password') !="") {
              $leUser->password = bcrypt($request->get('password'));
        }





        $leUser->save();

        return redirect()->route("profil");
    }

    function message(Request $request) {
      //  var_dump($request->get('contenu'));
       // dd($request->get('contenu'));

        $request->session()->flash('success', 'Merci! Votre message a bien été envoyé');

        $message = new Message();
        $message->auteur = $request->get('nom') . " " .$request->get('prenom');
        $message->email = $request->get('email');
        $message->titre = $request->get('titre');
        $message->contenu = stripslashes(nl2br(htmlentities($request->get('contenu'))));
        $message->tel = $request->get('telephone');

        $message->save();

        $data = array('sujet' => $request->get('titre'));

        Mail::send('admin.message.mail', ['titre'=>$request->get('titre'),'contenu'=>$request->get('contenu'),'auteur'=>$request->get('nom') . " " . $request->get('prenom')], function ($mail) use ($data){
            $mail->from('ppetennis@gmail.com','Tennis Club Tavaux');
            $mail->to('benoit.plaideau@gmail.com');
            $mail->subject($data['sujet']);
        });
        return redirect()->route("contact");
    }


    public function accepter($id,$idJoueur,Request $request)
    {
        $request->session()->flash('success', 'Les convocations sont acceptées !');
        $rencontre = Rencontre::find($id);
        $leJoueur = User::find($idJoueur);
        $request->get('confirmation'.$leJoueur->id);
        if ($request->get('confirmation'.$leJoueur->id)=='on')
        {
            $leJoueur->rencontres()->attach($rencontre,['confirmation'=>1]);
        }
        $leJoueur->save();
        return redirect()->route("profil");
    }

    public function store(Request $request)
    {


    }

    public function create()
    {
        $contenu=Menu::where("slug","contact")->first();
        return view('front.contact')->with("contenu",$contenu);
    }


}
