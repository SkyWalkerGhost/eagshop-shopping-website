<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('review_id')
                    ->foreign()
                    ->references('product_id')
                    ->on('products')
                    ->onDelete('cascade');
                    
            $table->text('review_name')->nullable();
            $table->integer('star')->nullable();
            $table->string('user_name')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('user_ip')->nullable();
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
        Schema::dropIfExists('product_reviews');
    }
}
