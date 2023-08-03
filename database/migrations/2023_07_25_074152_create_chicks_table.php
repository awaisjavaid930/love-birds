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
        Schema::create('chicks', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('pair_id')->comment('Parent Id of Parent Table');
            $table->string('title');
            $table->string('ring_no')->nullable();
            $table->string('dob');
            $table->string('gender')->nullable();
            $table->string('cage_no');
            $table->boolean('is_sold')->default(0);
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
        Schema::dropIfExists('chicks');
    }
};
