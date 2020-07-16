<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVideosAdminVideosTablesAddLocal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos',function (Blueprint $blueprint){
            $blueprint->text('video')->nullable()->change();
            $blueprint->string('local')->nullable();
        });
        Schema::table('admin_videos',function (Blueprint $blueprint){
            $blueprint->text('video')->nullable()->change();
            $blueprint->string('local')->nullable();
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
