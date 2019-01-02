<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IP_address_0', function (Blueprint $table) {
            $table->integer('ip2long')->unsigned()->primary();
            $table->string('ip',100)->index();
            $table->string('result');
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
        });

        Schema::create('IP_address_1', function (Blueprint $table) {
            $table->integer('ip2long')->unsigned()->primary();
            $table->string('ip',100)->index();
            $table->string('result');
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
        });

        Schema::create('IP_address_2', function (Blueprint $table) {
            $table->integer('ip2long')->unsigned()->primary();
            $table->string('ip',100)->index();
            $table->string('result');
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
        Schema::dropIfExists('IP_address_0');
        Schema::dropIfExists('IP_address_1');
        Schema::dropIfExists('IP_address_2');
    }
}
