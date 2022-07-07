<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->integer('key_id');
            $table->string('name');
            $table->bigInteger('federal_entity_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('municipalities', function ($table) {
            $table->foreign('federal_entity_id')->references('id')->on('federal_entities');
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

        Schema::dropIfExists('municipalities');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
