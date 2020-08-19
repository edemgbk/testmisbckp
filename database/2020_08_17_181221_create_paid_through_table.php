<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidThroughTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_through', function (Blueprint $table) {
            $table->id();
            $table->string('AccountName')->nullable();
            $table->string('AccountCode')->nullable();
            $table->string('AccountTyoe_id')->nullable();
            $table->string('Currency_id')->nullable();
            $table->string('description')->nullable();
            $table->foreign('Currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('AccountTyoe_id')->references('id')->on('account_type')->onUpdate('cascade')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('paid_through');
    }
}
