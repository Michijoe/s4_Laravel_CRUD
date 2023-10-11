<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('nom', 100);
            $table->string('adresse', 500);
            $table->string('telephone', 20);
            $table->string('email', 255)->unique();
            $table->date('date_naissance')->format('d-m-Y');
            $table->unsignedBigInteger('ville_id');
            $table->timestamps();

            $table->foreign('ville_id')->references('id')->on('villes');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
