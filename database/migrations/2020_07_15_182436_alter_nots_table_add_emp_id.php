<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNotsTableAddEmpId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nots',function (Blueprint $blueprint){
            $blueprint->unsignedBigInteger('user_id')->nullable()->change();
            $blueprint->unsignedBigInteger('emp_id')->nullable();
            $blueprint->unsignedBigInteger('admin_id')->nullable();
            $blueprint->foreign('emp_id')->on('employees')->references('id')->onDelete('cascade');
            $blueprint->foreign('admin_id')->on('admins')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
