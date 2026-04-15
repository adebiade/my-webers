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
      Schema::create('arp_products', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('username');

          $table->string('short_description')->nullable();
          $table->string('slug')->unique();
          $table->text('description');
          $table->string('address');
          $table->decimal('squareft');
          $table->decimal('regular_price');
          $table->decimal('sale_price');
          $table->string('bedroom');
          $table->string('bathroom');
          $table->string('SKU');
          $table->enum('stock_status',['Available','Sold']);
          $table->boolean('featured')->default(false);
          $table->unsignedInteger('quantity')->default(10);
          $table->string('image')->nullable();
          $table->text('images')->nullable();
          $table->bigInteger('category_id')->unsigned()->nullable();
          //$table->bigInteger('brand_id')->unsigned()->nullable();
          $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        //  $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
          $table->timestamps();
          $table->string('kitchen');
          $table->string('livingroom');
          $table->string('utilityarea');
          $table->string('flooringfinish');
          $table->string('individualunit');
          $table->string('familyunit');
          $table->string('sharedwallfloor');
          $table->string('balconieorterrace');
          $table->string('entrancescorridors');
          $table->string('electricitylighting');
          $table->string('plumbing');
          $table->string('hvacACUnits');
          $table->string('internetcableready');
          $table->string('petfriendlyspaces');
          $table->string('locksintercom');
          $table->string('elevatorsstaircases');
          $table->string('rooftopgardenterrace');
          $table->string('parking');
          $table->string('securitysystem');
          $table->string('powerbackup');
          $table->string('wastedisposalsystem');
          $table->string('gymorfitnesscenter');
          $table->string('swimmingpool');
          $table->string('clubhouseorlounge');
          $table->string('childrenplayarea');
          $table->string('Coworkingspaces');


      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arp_products');
    }
};
