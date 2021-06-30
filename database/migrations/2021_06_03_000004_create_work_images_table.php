<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkImagesTable extends Migration
{
    public function up()
    {
        Schema::create('work_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->integer('position')->nullable();
            $table->string('status');
            $table->string('reported')->nullable();
            $table->timestamps();
        });
    }
}
