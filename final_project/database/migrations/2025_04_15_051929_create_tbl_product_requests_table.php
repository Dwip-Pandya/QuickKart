<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_product_requests', function (Blueprint $table) {
            $table->id('product_request_id');
            $table->unsignedBigInteger('user_id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->timestamp('requested_at')->useCurrent();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product_requests');
    }
};
