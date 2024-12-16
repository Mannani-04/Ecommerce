<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $primaryKey="idContact";
    protected $fillable = ['nomContact','numTel','email','choix','autre_choix','message'];
}
