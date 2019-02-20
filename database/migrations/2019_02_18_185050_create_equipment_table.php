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
            $table->unsignedInteger('EquipmentType_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');

            $table->string('model');
            $table->string('serial_no')->nullable();
            $table->string('inventory_number');

            $table->date('purchase_date')->nullable();
            $table->date('deleted_date')->nullable();
            $table->timestamps();

            $table->boolean('is_deleted')->default(false);

            $table->foreign('EquipmentType_id')->references('id')->on('equipment_types');//->onDelete('cascade')
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
