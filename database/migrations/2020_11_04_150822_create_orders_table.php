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
            $table->bigIncrements('id');
            $table->bigInteger('seller_id');
            $table->string('bill_name',50)->nullable();
            $table->string('business_name',50)->nullable();
            $table->string('full_address')->nullable();
            $table->string('order_desc')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('order_count')->default(0);
            $table->string('delivery_name',50)->nullable();
            $table->string('delivery_address')->nullable();
            $table->integer('delivery_number')->default(0);
            $table->string('delivery_complement')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state',20)->nullable();
            $table->string('delivery_zip',20)->nullable();
            $table->string('delivery_neighborhood')->nullable();
            $table->bigInteger('transporter_id')->default(0);
            $table->string('track_key',50)->nullable();
            $table->string('status',20)->default('inactive');
            $table->date('request_at')->nullable();
            $table->string('type',10)->default('api');
            $table->bigInteger('api_id')->default(0);
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
