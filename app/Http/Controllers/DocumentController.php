<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Http\Request;
use Image;
Use File;
use Auth;

class DocumentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $lesDocs = Document::all();
    return view('admin.document.index')->with('tab_docs',$lesDocs);
  }


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response */

  public function create()
  {
    return view('admin.document.create');
  }



  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $request->session()->flash('success', 'Le fichier à été ajouté !');

    $document = new Document();
    $document->titre = $request->get('titre');
    $contenu = $request->file('document');
    $documentname = time().'.'.$contenu->getClientOriginalExtension();
    $destinationPath = public_path('doc/');
    $contenu->move($destinationPath, $documentname);
    $document->contenu = $documentname;
    $document->save();

    return redirect()->route("document.index");
  }




  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $tab_docs = Document::find($id);
    return view('site.document.show', compact('tab_docs'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, $id)
  {
    $request->session()->flash('success', 'Le document à été supprimé !');

    $doc = Document::find($id);
    File::delete("doc/" . $doc->fichier);
    $doc->delete();

    return redirect()->route("document.index");
  }

  public function visu()
  {
    $lesDocs = Document::all();
    return view('front.consultation_documents')->with('tab_docs',$lesDocs);
  }
}
