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
        Schema::create('agriculteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->string('cin');
            $table->string('tel');
            $table->string('zone');
            $table->string('region');
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('agriculteurs');
    }
};
