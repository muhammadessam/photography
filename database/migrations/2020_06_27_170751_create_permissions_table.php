<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->on('admins')->references('id')->onDelete('cascade');
            $table->boolean('admins')->default(0);
            $table->boolean('employees')->default(0);
            $table->boolean('customers')->default(0);
            $table->boolean('categories')->default(0);
            $table->boolean('settings')->default(0);
            $table->boolean('bills')->default(0);
            $table->boolean('orders')->default(0);
            $table->timestamps();
        });
        $pers = new \App\Permission();
        $pers['admins'] = 1;
        \App\Admin::first()->permissions()->save($pers);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
