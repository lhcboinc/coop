<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkImagesTable extends Migration
{
    public function up()
    {
        Schema::table('work_images', function (Blueprint $table) {
            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')->references('id')->on('works');
        });
    }
}
