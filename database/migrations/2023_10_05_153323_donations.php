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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('programId');
            $table->integer('event_id');
            $table->date('donationDate');
            $table->string('account_number');
            $table->string('donation_amount');
            $table->string('transaction_number');
            $table->string('transaction_id')->nullable();
            $table->integer('is_approved')->nullable();
            $table->date('approval_date')->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
