<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('categoryid');
            $table->string('categoryname')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('productid');
            $table->string('productname')->unique();
            $table->decimal('price', 20, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->decimal('amount', 20, 2)->storedAs('price * quantity');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('catid');
            $table->foreign('catid')->references('categoryid')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

   public function down(): void
{
    Schema::dropIfExists('products');
    Schema::dropIfExists('categories');
}
};