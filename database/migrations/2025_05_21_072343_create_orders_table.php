<?php

use App\Models\Order;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->comment('Товар в заказе');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('product_count')->default(1)->comment('Кол-во товара');
            $table->string('customer_name')->comment('ФИО покупателя');
            $table->enum('status', array_keys(Order::STATUSES))->default(array_keys(Order::STATUSES)[0]);
            $table->text('comment')->comment('Коментарии покупателя');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
