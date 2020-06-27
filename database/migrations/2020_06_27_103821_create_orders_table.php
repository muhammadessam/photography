<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable()->default(null);
            $table->unsignedBigInteger('employee_id')->nullable()->default(null);
            $table->unsignedBigInteger('cat_id')->nullable()->defualt(null);
            $table->enum('status', ['waiting', 'accepted', 'billed', 'final', 'rejected'])->default('waiting');
            $table->text('address');
            $table->boolean('is_special');
            $table->boolean('is_right_print');
            $table->boolean('is_on_our_page');
            $table->timestamp('date');
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
        Schema::dropIfExists('orders');
    }
}
