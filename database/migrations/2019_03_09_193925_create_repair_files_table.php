<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipment_repair_id');
            $table->string('description');
            $table->string('url');
            $table->timestamps();

            $table->foreign('equipment_repair_id')->references('id')->on('equipment_repairs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_files');
    }
}
