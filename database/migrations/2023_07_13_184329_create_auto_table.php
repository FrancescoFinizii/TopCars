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
        Schema::create('auto', function (Blueprint $table) {
            $table->id();
            $table->char('targa', 7)->unique();
            $table->string('modello', 100);
            $table->string('marca', 30);
            $table->string('motore', 20);
            $table->string('cambio', 20);
            $table->smallInteger('bagaglio', unsigned: true);
            $table->char('porte', 1);
            $table->char('posti', 1);
            $table->decimal('autonomia', 6, unsigned: true);
            $table->string("colore", 30);
            $table->string("foto")->nullable();
            $table->text("descrizione")->nullable();
            $table->date("emissione");
            $table->date("scadenza");
            $table->decimal("costoGiornaliero", 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto');
    }
};
