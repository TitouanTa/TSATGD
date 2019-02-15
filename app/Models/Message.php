<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['auteur', 'telephone', 'mail', 'contenu'];
    protected $guarded = ['id', 'validation'];
}
