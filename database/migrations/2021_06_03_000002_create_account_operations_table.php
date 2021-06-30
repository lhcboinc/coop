<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('account_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('operation');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
