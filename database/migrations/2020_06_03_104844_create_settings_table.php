<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default(env('APP_NAME'));
            $table->boolean('is_closed')->default(0);
            $table->text('close_msg')->nullable();
            $table->boolean('can_register')->default(1);
            $table->string('app_email')->default('example@example.com');
            $table->text('contact')->nullable();
            $table->boolean('verify_email')->default(0);
            $table->string('sms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
