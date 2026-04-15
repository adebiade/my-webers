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
      Schema::create('off_products', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('slug')->unique();
          $table->string('short_description')->nullable();
          $table->text('description');
          $table->string('address');
          $table->text('reference');
          $table->decimal('squareft');
          $table->decimal('sale_price');
          $table->string('Mtingrooms');
          $table->string('restrooms');
          $table->string('rceptnarea');
          $table->string('privateoffices');
          $table->string('brkroomcafeteria');
          $table->string('strgefilesarea');
          $table->string('cnfrencerooms');
          $table->string('opnplanareas');
          $table->string('intntwkinfrtrture');
          $table->string('securitysyst');
          $table->string('hvac');
          $table->string('Egnmcfniture');
          $table->string('lighting');
          $table->string('prntcopy');
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
        Schema::dropIfExists('off_products');
    }
};
