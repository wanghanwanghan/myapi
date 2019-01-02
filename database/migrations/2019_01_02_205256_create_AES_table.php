<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AES_0', function (Blueprint $table) {
            $table->text('encode');
            $table->string('decode',100);
            $table->string('key',100);
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->primary(['decode','key']);
        });

        Schema::create('AES_1', function (Blueprint $table) {
            $table->text('encode');
            $table->string('decode',100);
            $table->string('key',100);
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->primary(['decode','key']);
        });

        Schema::create('AES_2', function (Blueprint $table) {
            $table->text('encode');
            $table->string('decode',100);
            $table->string('key',100);
            $table->timestamps();
            $table->engine='InnoDB';
            $table->charset='utf8mb4';
            $table->primary(['decode','key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AES_0');
        Schema::dropIfExists('AES_1');
        Schema::dropIfExists('AES_2');
    }
}
