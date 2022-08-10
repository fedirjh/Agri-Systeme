<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBennesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bennes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nbenne');
            $table->string('long');
            $table->string('larg');
            $table->string('haut');
            $table->string('req');
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
        Schema::dropIfExists('bennes');
    }
}
