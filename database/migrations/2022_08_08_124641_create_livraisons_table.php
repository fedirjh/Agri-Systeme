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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('remarque')->nullable();
            $table->smallInteger('status')->default(0);
            // 0 en cours livraison
            // 1 livree
            // 2 receptionne
            // 3 reception en attente
            // 4 reception rejete

            $table->bigInteger('quantityLivraison')->nullable();
            $table->bigInteger('quantityReception')->nullable();
            $table->date('livraisonDate')->nullable();
            $table->date('receptionDate')->nullable();

            $table->unsignedBigInteger('transporteur_id')->unsigned()->nullable();
            $table->unsignedBigInteger('agriculteur_id')->unsigned()->nullable();
            $table->foreign('transporteur_id')->references('id')->on('transporteurs');
            $table->foreign('agriculteur_id')->references('id')->on('agriculteurs');
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
        Schema::dropIfExists('livraisons');
    }
};
