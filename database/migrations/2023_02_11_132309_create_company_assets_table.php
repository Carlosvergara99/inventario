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
        Schema::create('company_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_code', 250);
            $table->string('trademark', 250);
            $table->string('refernece', 250);
            $table->longText('description');
            $table->char('status', 2);
            $table->timestamps();
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_assets');
    }
};
