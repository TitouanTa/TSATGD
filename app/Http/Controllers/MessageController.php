<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesMessages = Message::orderBy('validation','ASC')->orderBy('updated_at','DESC')->get();
        return view('admin.message.index')->with('lesMessages', $lesMessages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();

        $message->auteur = $request->get('auteur');
        $message->contenu = $request->get('contenu');
        $message->mail = $request->get('mail');
        $message->telephone = $request->get('telephone');


        $message->save();
        $request->session()->flash('success', 'L\'message à été Ajouté !');
        return redirect()->route("contact");
    }
    public function send(Request $request)
    {
        $message = new Message();

        $message->auteur = $request->get('auteur');
        $message->contenu = $request->get('contenu');
        $message->mail = $request->get('mail');
        $message->telephone = $request->get('telephone');


        $message->save();
        $request->session()->flash('success', 'L\'message à été Ajouté !');
        return redirect()->route("contact");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unMessage = Message::find($id);
        return view('admin.message.show')->with('unMessage', $unMessage);
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
        $message = Message::find($id);
        
        $data = array( 'mail' => $message->mail, 'sujet' => $message->titre);
        
        Mail::send('admin.message.mail', ['mail'=>$message->mail,'titre'=>'Réponse à votre demande','contenu'=>$request->get('contenu'),'auteur'=>$request->get('nom') . " " . $request->get('prenom')], function ($mail) use($data){
            $mail->from('tsatgd@gmail.com','Tennis Club Tavaux');
            $mail->to($data["mail"]);
            $mail->subject('Réponse à votre demande');
        });

        $message->validation = 1;
        $message->save();

        return redirect()->route("message.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
