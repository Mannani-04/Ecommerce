<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $primaryKey="idClient";
    protected $fillable = ['nomClient','numTelephone','email','adresse'];

    protected function panier()
    {
     return $this->hasMany(Panier::class, 'idClient','idClient');
    }
}
