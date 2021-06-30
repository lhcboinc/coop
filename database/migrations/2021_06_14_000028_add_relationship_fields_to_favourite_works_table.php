<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFavouriteWorksTable extends Migration
{
    public function up()
    {
        Schema::table('favourite_works', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')->references('id')->on('works');
        });
    }
}
