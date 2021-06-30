<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('text');
            $table->datetime('sent_at');
            $table->datetime('read_at')->nullable();
            $table->string('endorsed')->nullable();
            $table->string('reported')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
