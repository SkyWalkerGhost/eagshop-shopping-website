<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('address_id')
                    ->foreign()
                    ->references('id')
                    ->on('address')
                    ->onDelete('cascade');
            
            $table->bigInteger('checkout_id')
                    ->foreign()
                    ->references('product_id')
                    ->on('products')
                    ->onDelete('cascade');

            $table->bigInteger('user_id')
                    ->foreign()
                    ->references('id')
                    ->on('shop_users')
                    ->onDelete('cascade');

            
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
        Schema::dropIfExists('checkouts');
    }
}
