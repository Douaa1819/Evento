<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['client_id' ,'evenement_id' ,'status'];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class ,'evenement_id');
    }

     public function client()
     {
        return $this->belongsTo(Client::class);
     }
}


