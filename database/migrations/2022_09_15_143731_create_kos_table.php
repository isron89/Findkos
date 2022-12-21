<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('name')->nullable(false);
            $table->string('gambar')->nullable();
            $table->integer('harga')->nullable(false);
            $table->integer('ukuran')->nullable(false);
            $table->integer('ac')->nullable(false);
            $table->integer('parkir')->nullable(false);
            $table->integer('kamarmandi')->nullable(false);
            $table->integer('wifi')->nullable(false);
            $table->integer('hasil_fuzzy')->default(0);
            $table->integer('delta_harga')->default(0);
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
        Schema::dropIfExists('kos');
    }
};
