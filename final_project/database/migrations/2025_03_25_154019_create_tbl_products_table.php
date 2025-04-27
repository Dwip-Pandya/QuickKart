<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('description');
            $table->string('price');
            $table->string('stock_quantity');
            $table->string('category_id');
            $table->string('subcat_id');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('porduct_point1');
            $table->string('porduct_point2');
            $table->string('porduct_point3');
            $table->string('porduct_point4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};
