<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Phone_0', function (Blueprint $table) {
            $table->bigInteger('phone')->unsigned()->primary();
            $table->text('result');
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
        });

        Schema::create('Phone_1', function (Blueprint $table) {
            $table->bigInteger('phone')->unsigned()->primary();
            $table->text('result');
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
        });

        Schema::create('Phone_2', function (Blueprint $table) {
            $table->bigInteger('phone')->unsigned()->primary();
            $table->text('result');
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_0');
        Schema::dropIfExists('phone_1');
        Schema::dropIfExists('phone_2');
    }
}
