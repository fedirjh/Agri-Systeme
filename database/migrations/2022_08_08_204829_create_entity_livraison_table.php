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
        Schema::dropIfExists('entity_livraison');
        Schema::create('entity_livraison', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('livraison_id');

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('livraison_id')->references('id')->on('livraisons');

            $table->bigInteger('quantityLivraison')->nullable();
            $table->bigInteger('quantityReception')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entity_livraison', function (Blueprint $table) {
            //
        });
    }
};
