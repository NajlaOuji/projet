<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_module')->nullable();
            $table->foreign('id_module')->references('id')->on('modules')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('titre_tache')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('id_membre')->nullable();
            $table->foreign('id_membre')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('date_debut')->nullable();
            $table->string('date_fin')->nullable();
            $table->integer('taux_avancement')->nullable();
            $table->string('etat')->nullable();
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
        Schema::dropIfExists('taches');
    }
}
