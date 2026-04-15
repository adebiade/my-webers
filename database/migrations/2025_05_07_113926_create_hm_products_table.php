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
      Schema::create('hm_products', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('slug')->unique();
          $table->string('short_description')->nullable();
          $table->text('description');
          $table->string('address');
          $table->text('reference');
          $table->decimal('squareft');
          $table->decimal('sale_price');
          $table->string('bedroom');
          $table->string('bathroom');
          $table->string('dining');
          $table->string('windows');
          $table->string('roof');
          $table->string('storage');
          $table->string('pchblnydeck');
          $table->string('homeofficestudy');
          $table->string('facadedesign');
          $table->string('flooring');
          $table->string('laundryroom');
          $table->string('lighting');
          $table->string('livingrooms');
          $table->string('hvac');
          $table->string('gym');
          $table->string('plumbing');
          $table->string('fireplace');
          $table->string('smartsystems');
          $table->string('securitysystems');
          $table->string('securelcksdoors');
          $table->string('ldscpngYardgdenspce');
          $table->string('fireextinguishers');
          $table->string('Sstnablebuldngmtrls');
          $table->string('solarpanels');
          $table->string('soundproof');
          $table->string('greenroofswalls');
          $table->string('rainwaterharvesting');
          $table->string('swmgplhottub');
          $table->string('drivewaygarage');


          $table->string('SKU');
          $table->enum('stock_status',['Available','Sold']);
          $table->boolean('featured')->default(false);
          $table->unsignedInteger('quantity')->default(10);
          $table->string('image')->nullable();
          $table->text('images')->nullable();
          $table->bigInteger('category_id')->unsigned()->nullable();
        //  $table->bigInteger('brand_id')->unsigned()->nullable();
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        //  $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hm_products');
    }
};
