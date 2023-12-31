<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->string('password');
            $table->string('program_id')->nullable();
            $table->string('event_id')->nullable();
            $table->string('country_id');
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('address');
            $table->string('phone_no');
            $table->string('active_status')->default('1');
            $table->string('data_status')->default('1');
            $table->string('updated_by')->default('1');
            $table->string('created_by')->default('1');
            $table->string('delated_by')->default('1');
            $table->string('image')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
