<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");

            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("display_name")->nullable();

            $table->string("billing_first_name")->nullable();
            $table->string("billing_last_name")->nullable();
            $table->string("billing_company")->nullable();
            $table->string("billing_address")->nullable();
            $table->string("billing_country")->nullable();
            $table->string("billing_state")->nullable();
            $table->string("billing_city")->nullable();
            $table->string("billing_postcode")->nullable();

            $table->string("shipping_first_name")->nullable();
            $table->string("shipping_last_name")->nullable();
            $table->string("shipping_company")->nullable();
            $table->string("shipping_address")->nullable();
            $table->string("shipping_country")->nullable();
            $table->string("shipping_state")->nullable();
            $table->string("shipping_city")->nullable();
            $table->string("shipping_postcode")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
