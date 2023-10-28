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
        Schema::create('logements', function (Blueprint $table) {
            $table->id('code');
            $table->string('nom');
            $table->integer('capacite');
            $table->string('type');
            $table->string('lieu');
            $table->string('photo');
            // $table->boolean('disponiblite');
            $table->enum('disponibilite', ['oui', 'non']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};
