<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('text')->nullable();
            $table->string('signal')->nullable();
            $table->string('skype')->nullable();
            $table->string('telegram')->nullable();
            $table->string('viber')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('photo')->nullable();
            $table->datetime('ready_to_go')->nullable();
            $table->datetime('latest_activity')->nullable();
            $table->float('rating_as_worker', 3, 2)->nullable();
            $table->float('rating_as_client', 3, 2)->nullable();
            $table->string('gps_lat')->nullable();
            $table->string('gps_long')->nullable();
            $table->string('gps_approx')->nullable();
            $table->string('country')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('status')->nullable();
            $table->integer('impressions')->nullable();
            $table->integer('views')->nullable();
            $table->string('note')->nullable();
            $table->boolean('notify_email')->default(0)->nullable();
            $table->boolean('notify_push')->default(0)->nullable();
            $table->boolean('notify_sms')->default(0)->nullable();
            $table->datetime('confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
