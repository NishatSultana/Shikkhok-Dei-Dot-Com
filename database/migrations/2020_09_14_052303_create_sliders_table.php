<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{

    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
