<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->id("idProduit");
            $table->string("nomProduit");
            $table->integer("prix");
            $table->string("description");
            $table->string("image");
            $table->bigInteger('idCategorie')->unsigned();
            $table->foreign('idCategorie')->references('idCategorie')->on('categorie')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit');
    }
};
