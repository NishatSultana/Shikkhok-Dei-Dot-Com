<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('profile_pic', 100)->nullable();
            $table->datetime('dob')->nullable();
            $table->smallInteger('gender')->nullable();
            $table->string('present_address', 500)->nullable();
            $table->string('permanent_address', 500)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('is_system_user')->default(0);
            $table->tinyInteger('is_staff')->default(0);
            $table->string('remember_token', 150)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('bio')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
