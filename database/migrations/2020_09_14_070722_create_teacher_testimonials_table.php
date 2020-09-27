<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('name_designation')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreignId('teachers_id')->constrained()->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('teacher_testimonials');
    }
}
