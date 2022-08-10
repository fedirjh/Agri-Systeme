<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('tel');
            $table->string('cin');
            $table->string('mat')->nullable();
            $table->string('zone');
            $table->string('matricule');
            $table->string('type');
            $table->string('garntie');
            $table->string('montant');
            $table->string('rq');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('contrat')->default(0);
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
        Schema::dropIfExists('transporteurs');
    }
}
