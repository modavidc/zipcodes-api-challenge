<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->integer('key_id');
            $table->string('name');
            $table->string('zone_type');
            $table->bigInteger('settlement_type_id')->unsigned();
            $table->bigInteger('zip_code_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('settlements', function ($table) {
            $table->foreign('settlement_type_id')->references('id')->on('settlement_types');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes');
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

        Schema::dropIfExists('settlements');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
