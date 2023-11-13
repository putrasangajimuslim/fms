<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_campaign');
            $table->string('customer_name');
            $table->text('address');
            $table->string('phone_number');
            $table->string('geo_tagging');
            $table->integer('status');
            $table->integer('estimate_price');
            $table->integer('fix_price');
            $table->integer('created_by');
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
        Schema::dropIfExists('list_transactions');
    }
};
