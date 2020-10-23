<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->json('date')->comment('object of hijri data and date');
            $table->string('owner')->nullable();
            $table->string('building_no')->nullable();
            $table->string('building_name')->nullable();
            $table->string('street')->nullable();
            $table->string('neignborhood')->nullable();
            $table->string('city')->nullable();
            $table->longText('details')->nullable();

            $table->string('attach_1')->nullable();
            $table->string('attach_2')->nullable();
            $table->string('attach_3')->nullable();
            $table->string('attach_4')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('structures');
    }
}
