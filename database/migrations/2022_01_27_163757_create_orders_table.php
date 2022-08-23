<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('uuid')->unique();
            $table->string('order_number');
            $table->enum('status',['pending','processing','completed','declined'])->default('pending');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method',['cash_on_delivery','paypal','stripe','card'])->default('cash_on_delivery');
            $table->float('shipping_cost')->nullable();
            $table->float('subtotal');
            $table->float('total');
            $table->string('shipping_method');
            $table->boolean('ship_to_a_different_address')->default(false);
            $table->string('phone');
            $table->string('email_address');
            $table->string('order_notes')->nullable();
            //Billing Address
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company')->nullable();
            $table->string('billing_country_region');
            $table->string('billing_address_street');
            $table->string('billing_address_apartment')->nullable();
            $table->string('billing_town_city');
            $table->string('billing_zip');
            $table->string('billing_state');
             //Shipping Address
             $table->string('shipping_first_name');
             $table->string('shipping_last_name');
             $table->string('shipping_company')->nullable();
             $table->string('shipping_country_region');
             $table->string('shipping_address_street');
             $table->string('shipping_address_apartment')->nullable();
             $table->string('shipping_town_city');
             $table->string('shipping_zip');
             $table->string('shipping_state');
        

           

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
        Schema::dropIfExists('orders');
    }
}
