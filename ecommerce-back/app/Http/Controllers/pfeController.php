<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Contact;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\Client;
use App\Models\User;




class PfeController extends Controller
{
    public function ajouterC(Request $request)
    {$article = Contact::create($request->all());
        return response()->json($article, 201);
    }

    public function AjouterProduit(Request $request){
        // Log::info($request->all());
        $produit = Produit::create([
            'nomProduit' => $request->nomProduit,
            'image' => $request->file('image')->store('images','public'),
            'description'=> $request->description,
                                'prix' => $request->prix,
            'idCategorie' => $request->idCategorie,
            
        ]);
        return response()->json(['message'=>'bien ajouté ','produit'=>$produit],201);
    }

    public function AfficherListCategories(){
        $listcate = Categorie::all();
        return $listcate;
    }
    public function AfficherListProduits(){
        $listpro = Produit::all();
        return $listpro;
    }


    public function Panier(Request $request,$id){
        Log::info($request->all());
        $panier = Panier::create([
            'nomProduit' => $request->nomProduit,
            'image' => $request->image,
            'prix' => $request->prix,
            'idClient'=>$id,
            'Total_A_Payer'=>$request->Total_A_Payer,
            
        ]);
        return response()->json(['message'=>'bien ajouté ','produit'=>$panier],201);
    }
    public function AjjClient(Request $request){
        Log::info($request->all());
        $client = Client::create([
            'nomClient' => $request->nomClient,
                'numTelephone' => $request->numTelephone,
                'email'=>$request->email,
                'adresse' => $request->adresse,
        ]);
        return response()->json(['message'=>'bien ajouté ','client'=>$client],201);
    }
    public function ajouterCategorie(Request $request){
        Log::info($request->all());
        $categorie = Categorie::create([
            'nomCategorie' => $request->nomCategorie,
        ]);
        return response()->json(['message'=>'bien ajouté ','categorie'=>$categorie],201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'eror' => false,
                'status' => 401,
            ], 401);
        }

        $user = auth()->user();
        $token = $user->createToken('login_test');
        return response()->json([
            'success' => true,
            'token' => $token->plainTextToken,
            'user' => $user
        ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if($user){
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Successfully logged out'], 200);
        }
    }
    public function AfficherNomUser(Request $request)
    {
        $user = $request->user();
        if($user){
            return response()->json(['user' => $user], 200);
        }
    }
}