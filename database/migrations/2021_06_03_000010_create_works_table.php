<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('gps_lat');
            $table->string('gps_long');
            $table->string('gps_approx');
            $table->string('payment_type');
            $table->decimal('payment_rate', 15, 2)->nullable();
            $table->boolean('transportation')->default(0);
            $table->boolean('catering')->default(0);
            $table->string('country');
            $table->string('county');
            $table->string('city');
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('client_ip');
            $table->string('status');
            $table->integer('impressions')->nullable();
            $table->integer('views')->nullable();
            $table->string('endorsed')->nullable();
            $table->string('reported')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
