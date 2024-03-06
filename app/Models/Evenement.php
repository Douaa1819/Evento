<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'description', 'category_id', 'lieu', 'place_disponible','organizateur_id','date', 'image', 'validation'
    ];


    public function organisateur()
{
    return $this->belongsTo(Organizateur::class,'organizateur_id');
}
}
