<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tbl_order_items', function (Blueprint $table) {
            $table->id('order_item_id'); // Primary key
            $table->unsignedBigInteger('order_id'); 
            $table->unsignedBigInteger('product_id'); 
            $table->string('product_name');
            $table->decimal('price', 10, 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_order_items');
    }
};
