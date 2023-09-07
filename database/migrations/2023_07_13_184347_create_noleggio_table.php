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
        Schema::create('noleggio', function (Blueprint $table) {
            $table->id();
            $table->date("dataRitiro");
            $table->string("localitàRitiro", 100);
            $table->string("oraRitiro", 5);
            $table->date("dataConsegna");
            $table->string("localitàConsegna",100);
            $table->string("oraConsegna", 5);
            $table->decimal("importo", 9);
            $table->boolean("attivo");
            $table->unsignedBigInteger("clienteID" );
            $table->foreign('clienteID')->references('id')->on('cliente')->onDelete('cascade');
            $table->unsignedBigInteger("autoID");
            $table->foreign('autoID')->references('id')->on('auto')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noleggio');
    }
};
