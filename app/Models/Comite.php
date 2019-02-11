<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public $timestamps = false; //Seb, enlève cette ligne si tu veux les timestamps dans table comite. Oublie pas de les rajouter par contre (created_at, updated_at) -kevinB
    
}


