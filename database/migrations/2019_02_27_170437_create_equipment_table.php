<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipmenttype_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('room_id')->nullable();

            $table->string('model');
            $table->string('manufacturer');
            $table->string('serial');
            $table->string('inventory_no');
            $table->date('purchase_date')->nullable();
            $table->date('deletion_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('equipmenttype_id')->references('id')->on('equipmenttypes');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
