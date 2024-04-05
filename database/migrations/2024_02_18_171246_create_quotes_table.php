<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->onDelete('cascade');
            $table->string('price');
            $table->string('status');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payment_reference');
            $table->string('payment_date');
            $table->string('payment_time');
            $table->string('payment_amount');
            $table->string('payment_currency');
            $table->string('payment_description');
            $table->string('payment_receipt');
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
        Schema::dropIfExists('quotes');
    }
}
