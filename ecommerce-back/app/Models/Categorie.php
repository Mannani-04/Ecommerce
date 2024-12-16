<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categorie';
    protected $primaryKey="idCategorie";
    protected $fillable = ['nomCategorie'];

    protected function Produit()
    {
        return $this->hasMany(Produit::class,'idCategorie','idCategorie');
    }

}
