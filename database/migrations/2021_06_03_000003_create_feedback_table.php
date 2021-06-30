<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_rating')->nullable();
            $table->string('client_feedback')->nullable();
            $table->datetime('client_wrote_at')->nullable();
            $table->boolean('hide_client_feedback')->default(0)->nullable();
            $table->integer('worker_rating')->nullable();
            $table->string('worker_feedback')->nullable();
            $table->datetime('worker_wrote_at')->nullable();
            $table->boolean('hide_worker_feedback')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
