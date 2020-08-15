<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_reports', function (Blueprint $table) {
            $table->id();
            $table->string('pending')->nullable();
            $table->string('overdue')->nullable();
            $table->string('approved')->nullable();
            $table->string('rejected')->nullable();
            $table->string('reimbursement')->nullable();
            $table->string('archived')->nullable();
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
        Schema::dropIfExists('status_reports');
    }
}
