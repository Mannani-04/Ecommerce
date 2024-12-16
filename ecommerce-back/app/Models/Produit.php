<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produit';
    protected $primaryKey="idProduit";
    protected $fillable = ['nomProduit','prix','description','image','quantite','idCategorie'];
protected function categorie()
    {
     return $this->belongsTo(Categorie::class, 'idCategorie','idCategorie');
    }
 }
