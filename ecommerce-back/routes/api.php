<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PfeController;


Route::post('/contact', [PfeController::class,'ajouterC']);
Route::get('/AfficherListCategories',[PfeController::class,'AfficherListCategories']);
Route::post('/ajouterProduit', [PfeController::class,'ajouterProduit']);
Route::get('/AfficherListProduits',[PfeController::class,'AfficherListProduits']);
Route::post('/ajjPanier/{id}', [PfeController::class,'Panier']);
Route::post('/ajjClient', [PfeController::class,'AjjClient']);
Route::post('/ajouter-categorie', [PfeController::class,'ajouterCategorie']);
Route::post('/logout', [PfeController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/user',[PfeController::class,'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});     

