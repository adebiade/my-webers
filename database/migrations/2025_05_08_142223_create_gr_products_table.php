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
      Schema::create('gr_products', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('slug')->unique();
          $table->string('short_description')->nullable();
          $table->text('description');
          $table->string('address');
          $table->text('reference');
          $table->decimal('squareft');
          $table->decimal('sale_price');
          $table->string('vehiclestoragespace');
          $table->string('garagedoor');
          $table->string('drivewayaccess');
          $table->string('Wkbenchtool');
          $table->string('shelvingcabinets');
          $table->string('lghtngelctrcloutlets');
          $table->string('concreteflooring');
          $table->string('securityfeatures');
          $table->string('insulation');
          $table->string('pedestriandoor');
          $table->string('waterdrainage');
          $table->string('overheadstorage');
          $table->string('automateddoor');
          $table->string('firesafety');
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
        Schema::dropIfExists('gr_products');
    }
};
