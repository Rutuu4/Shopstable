<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id');
            $table->string('tracking_number')->unique;
            $table->string('email');
            $table->string('user_name');
            $table->integer('card_no');
            $table->date('exapiration_date');
            $table->integer('cvc');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->string('payment_mode');
            $table->float('sub_total');
            $table->float('discount')->nullable();
            $table->float('tax');
            $table->float('shipping');
            $table->float('total');
            $table->string('order_status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
};
