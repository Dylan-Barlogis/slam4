<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeichKeysEleveUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
        //Créer un autre colonne
            $table->unsignedBigInteger('eleve_id')->nullable();
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
        //
        Schema::dropIfExists('ForeichKeysEleveUser');
    }
}
