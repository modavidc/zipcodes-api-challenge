<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            // $table->string('d_CP');
            // $table->string('c_estado');
            // $table->string('c_oficina');
            // $table->string('c_CP');
            // $table->string('c_cve_ciudad');
            $table->bigInteger('federal_entity_id')->unsigned();
            $table->bigInteger('municipality_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('zip_codes', function ($table) {
            $table->foreign('federal_entity_id')->references('id')->on('federal_entities');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::dropIfExists('zip_codes');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
