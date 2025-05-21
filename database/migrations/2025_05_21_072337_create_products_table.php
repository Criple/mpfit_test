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
            $table->string('title')->comment('Наименование товара');
            $table->unsignedBigInteger('category_id')->comment('Категория товара');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->text('description')->nullable()->comment('Описание товара');
            $table->float('price')->default(0)->comment('Цена товара');
            $table->timestamps();
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
