<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id('order_id'); // Primary key
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_amount', 10, 2);
            $table->text('shipping_address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zip', 10);
            $table->string('payment_method', 50);
            $table->string('order_status')->default('Pending');
            $table->timestamp('order_date')->useCurrent();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_orders');
    }
};
