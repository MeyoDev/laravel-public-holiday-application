<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_holidays', function (Blueprint $table) {
            $table->id();
            $table->string('ph_name');
            $table->integer('ph_day');
            $table->integer('ph_month');
            $table->integer('ph_year');
            $table->integer('ph_day_of_week');
            $table->string('ph_hash')->unique();
            $table->timestamps();

            $table->index(['id', 'ph_name', 'ph_year', 'ph_hash']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_holidays');
    }
}
