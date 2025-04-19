<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ParentTuteur extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
    ];

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // plus de méthode notifications() ici
}
