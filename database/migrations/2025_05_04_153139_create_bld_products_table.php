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
      Schema::create('bld_products', function (Blueprint $table) {
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
          $table->string('foundation');
          $table->string('frame');
          $table->string('walls');
          $table->string('roof');
          $table->string('windowsdoors');
          $table->string('balconiesverandas');
          $table->string('staircaseselevators');
          $table->string('facadedesign');
          $table->string('Flooring');
          $table->string('ceilingdesign');
          $table->string('lightingfixtures');
          $table->string('rooms');
          $table->string('hvacsystems');
          $table->string('electricalwiring');
          $table->string('plumbing');
          $table->string('firesafetysystems');
          $table->string('smartsystems');
          $table->string('securitysystems');
          $table->string('internetnetworkcabling');
          $table->string('insulation');
          $table->string('solarpanels');
          $table->string('rainwaterharvesting');
          $table->string('greenroofswalls');
          $table->string('ramps');
          $table->string('accessiblerestrooms');
          $table->string('widedoorwayshallways');


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
        Schema::dropIfExists('bld_products');
    }
};
