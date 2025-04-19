<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'date_naissance', 'sexe', 'photo',
    'matricule', 'parent_tuteur_id'];

    public function parent()
    {
        return $this->belongsTo(ParentTuteur::class, 'parent_tuteur_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

  /*  public function parentTuteur()
{
    return $this->belongsTo(\App\Models\ParentTuteur::class);
} */

public function parentTuteur()
{
    return $this->belongsTo(ParentTuteur::class);
}


}


