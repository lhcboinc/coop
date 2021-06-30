<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('worker_ip');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
