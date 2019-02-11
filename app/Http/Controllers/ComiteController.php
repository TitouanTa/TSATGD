<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use App\Models\User;
class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesComites = Comite::with('Users')->get();
       
        return view('admin.comite.index')->with("lesComites", $lesComites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comite = new Comite();
        $comite->statut = $request->get('statut');
        $comite->ordre = $request->get('ordre');
        $comite->save();
        $request->session()->flash('success', 'Le statut ' . $request->get('statut') . ' a été créé !');
        return redirect()->route("comite.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comite = Comite::find($id);
        return view('admin.comite.edit')->with("comite", $comite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comite = Comite::find($id);
        $comite->statut = $request->get('statut');
        $comite->ordre = $request->get('ordre');
        $comite->save();

        $request->session()->flash('success', 'Le statut ' . $request->get('statut') . ' a été modifié !');
        return redirect()->route("comite.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $comite = Comite::find($id);
        Comite::destroy($id);

        $request->session()->flash('success', 'Le statut de comité ' . $comite->statut . ' à été supprimé !');
        return redirect()->route("comite.index");
    }
    public function addUser($id,Request $request)
    {
        //
        $users = User::selectRaw('id, CONCAT(prenom," ",nom) as full_name')->where('comite_id',null)->pluck('full_name', 'id');
        $comite = Comite::find($id);
         return view('admin.comite.user')->with("users", $users)->with("comite", $comite);;
   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addUserStatut($id,Request $request)
    {
        //
        $user = User::find($request->get("user"));
        $user->comite_id = $id;
        $user->save();
        return redirect()->route("comite.index");
    }

    public function deleteStatut($id,Request $request)
    {

        $statut = Comite::find($id);
        User::where('comite_id',$id)->update(['comite_id'=>NULL]);
        $statut->delete();

        return redirect()->route("comite.create");
    }

    public function deleteUserStatut($id)
    {
        $user = User::find($id);
        $user->comite_id = null;
        $user->save();
        return redirect()->route("comite.index");
    }

}
