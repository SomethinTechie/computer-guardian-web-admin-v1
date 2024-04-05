<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('recipient_id');
            $table->string('tracking_id');
            $table->string('status');
            $table->string('origin');
            $table->string('destination');
            $table->string('weight');
            $table->string('price');
            $table->string('parcel_type');
            $table->string('parcel_content');
            $table->string('parcel_quantity');
            $table->string('parcel_height');
            $table->string('parcel_width');
            $table->string('parcel_length');
            $table->string('parcel_description');
            $table->string('parcel_pickup_date');
            $table->string('parcel_delivery_date');
            $table->string('parcel_notes');
            $table->string('parcel_payment_method');
            $table->string('parcel_payment_status');
            $table->string('parcel_payment_reference');
            $table->string('parcel_payment_amount');
            $table->datetime('parcel_payment_date');
            
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
        Schema::dropIfExists('parcels');
    }
}