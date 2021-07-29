<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity')->default('0');
            $table->decimal('price', 10, 2)->default('0');
            $table->decimal('price_in_total', 10, 2)->default('0');
            $table->integer('action_percent')->default('0');
            $table->decimal('discount', 10, 2)->default('0');
            $table->decimal('action_price', 10, 2)->default('0');
            $table->string('size')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
