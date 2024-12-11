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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('regular_price', 8, 2);
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->string('SKU')->unique();
            $table->integer('quantity');
            $table->enum('stock_status', ['instock', 'outofstock'])->default('instock');
            $table->boolean('featured')->default(0);
            $table->string('image');
            $table->text('images')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('catagories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
