<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculs', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('varite');
            $table->string('cycle');
            $table->string('densite');
            $table->date('datep');
            $table->string('nbrp');
            $table->string('superficie')->nullable();
            $table->string('rdm');
            $table->date('dater')->nullable();
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
        Schema::dropIfExists('calculs');
    }
}
