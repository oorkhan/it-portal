<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletion_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipment_deletion_id');
            $table->string('del_file_description');
            $table->string('url');
            $table->timestamps();

            $table->foreign('equipment_deletion_id')->references('id')->on('equipment_deletions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deletion_files');
    }
}
