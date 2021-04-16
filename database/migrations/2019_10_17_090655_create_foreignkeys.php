<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('convocations', function (Blueprint $table) {
        //Créer un autre colonne
            $table->unsignedBigInteger('eleve_id');
            //Créer une clé étrangère
            $table->foreign('eleve_id')->references('id')->on('eleves');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreignkeys');
    }
}
