<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('locality');
            $table->integer('federal_entity_key');
            $table->integer('municipality_key');
            // $table->string('d_CP');
            // $table->string('c_estado');
            // $table->string('c_oficina');
            // $table->string('c_CP');
            // $table->string('c_cve_ciudad');
            $table->timestamps();
        });

        Schema::table('zip_codes', function ($table) {
            $table->index('zip_code');
            $table->index('locality');
            $table->index('federal_entity_key');
            $table->index('municipality_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
