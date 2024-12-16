<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table ='panier';
    protected $primaryKey ='idPanier';
    protected $fillable =['nomProduit','prix','image','idClient','Total_A_Payer'];

    protected function client()
    {
     return $this->belongsTo(Client::class, 'idClient','idClient');
    }
}
