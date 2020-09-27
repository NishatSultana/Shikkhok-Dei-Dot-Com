<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorJobsTable extends Migration
{

    public function up()
    {
        Schema::create('tutor_jobs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tutor_type')->nullable();
            $table->string('institute_name', 150)->nullable();
            $table->text('job_location')->nullable();
            $table->integer('no_of_students')->nullable();
            $table->string('salary')->nullable();
            $table->tinyInteger('day_per_week')->nullable();
            $table->integer('student_category')->nullable();
            $table->timestamp('hiring_time')->nullable();
            $table->string('student_class')->nullable();
            $table->string('subject_list')->nullable();
            $table->smallInteger('student_gender')->nullable();
            $table->smallInteger('tutor_gender')->nullable();
            $table->text('requirements')->nullable();
            $table->timestamps();
        });
        Schema::table('tutor_jobs', function (Blueprint $table) {
            $table->foreignId('users')->constrained()->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('tutor_jobs');
    }
}
