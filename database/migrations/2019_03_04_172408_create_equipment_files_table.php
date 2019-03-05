<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipment_owners_id');
            $table->string('url');
            $table->timestamps();

            $table->foreign('equipment_owners_id')->references('id')->on('equipment_owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_files');
    }
}
