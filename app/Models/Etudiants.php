<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['nom', 'prenom', 'sexe', 'filiere_id', 'user_id'];

    public function filieres()
    {
        return $this->belongsTo(Filieres::class);
    }
}
