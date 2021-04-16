<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocationMotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocation_motif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('motif_id');
            $table->unsignedBigInteger('convocation_id');
            //Créer une clé étrangère
            $table->foreign('convocation_id')->references('id')->on('convocations');
            //Créer une clé étrangère
            $table->foreign('motif_id')->references('id')->on('motifs');
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
        Schema::dropIfExists('convocation_motif');
    }
}
