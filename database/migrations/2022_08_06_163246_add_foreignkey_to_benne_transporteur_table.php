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
        Schema::dropIfExists('benne_transporteur');
        Schema::create('benne_transporteur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('transporteur_id');
            $table->unsignedBigInteger('benne_id');
            $table->foreign('transporteur_id')->references('id')->on('transporteurs');
            $table->foreign('benne_id')->references('id')->on('bennes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benne_transporteur', function (Blueprint $table) {
            //
        });
    }
};
