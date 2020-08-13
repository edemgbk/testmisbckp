<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->string('App_Name')->nullable();
            $table->string('Owner')->nullable();
            $table->string('Members')->nullable();
            $table->string('Groups')->nullable();
            $table->softDeletes();
            $table->foreign()->references('')->on('')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign()->references('')->on('')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign()->references('')->on('')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
