<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('user_ip')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('is_phone')->nullable();
            $table->string('is_desktop')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('region_name')->nullable();
            $table->text('page_url')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
