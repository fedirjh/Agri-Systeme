<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region');
            $table->string('varite');
            $table->string('cycle');
            $table->string('densite');
            $table->date('date_plantation');
            $table->string('nombre_plant');
            $table->string('superficie')->nullable();
            $table->string('rendement');
            $table->date('date_recolte')->nullable();
            $table->string('quantite');
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
        Schema::dropIfExists('rapports');
    }
}
