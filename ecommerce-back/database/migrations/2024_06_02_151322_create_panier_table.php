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
        Schema::create('panier', function (Blueprint $table) {
            $table->id('idPanier');
            $table->string('nomProduit');
            $table->integer('prix');
            $table->string("image");
            $table->decimal('Total_A_Payer')->unsigned();
            $table->bigInteger('idClient')->unsigned();
            $table->foreign('idClient')->references('idClient')->on('client')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('panier');
    }
};
