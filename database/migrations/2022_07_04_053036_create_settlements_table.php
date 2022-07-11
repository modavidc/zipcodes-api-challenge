<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('key');
            $table->string('name');
            $table->string('zone_type');
            $table->integer('settlement_type_key');
            $table->string('zip_code');
            $table->timestamps();
        });

        Schema::table('settlements', function ($table) {
            $table->index('key');
            $table->index('settlement_type_key');
            $table->index('zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
}
