<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->string('reference');
            $table->string('first-name');
            $table->string('last-name');
            $table->string('username');
            $table->string('cus_email');
            $table->string('currency');
            $table->string('amount');
            $table->string('date_time');
            $table->foreign('ap_id')->references('id')->on('arp_products')->onDelete('cascade');
            $table->foreign('bld_id')->references('id')->on('bld_products')->onDelete('cascade');
            $table->foreign('hm_id')->references('id')->on('hm_products')->onDelete('cascade');
            $table->foreign('vl_id')->references('id')->on('vl_products')->onDelete('cascade');
            $table->foreign('off_id')->references('id')->on('off_products')->onDelete('cascade');
            $table->foreign('twn_id')->references('id')->on('twn_products')->onDelete('cascade');
            $table->foreign('gr_id')->references('id')->on('gr_products')->onDelete('cascade');
            $table->foreign('sh_id')->references('id')->on('sh_products')->onDelete('cascade');
            $table->foreign('con_id')->references('id')->on('contact_details')->onDelete('cascade');






        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
