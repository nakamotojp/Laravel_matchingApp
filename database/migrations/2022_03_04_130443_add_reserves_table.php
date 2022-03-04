<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reserves', function (Blueprint $table) {

        //     $table->bigInteger('holder_id')->unsigned(); # 外部キー
        //     $table->foreign('holder_id')->references('id')->on('users')->onDelete('CASCADE'); # 外部キー制約をつける

        // });
        Schema::table('reserves', function (Blueprint $table) {
            $table->bigInteger('holder_id')->unsigned(); # 外部キー
            $table->foreign('holder_id')->references('id')->on('users')->onDelete('CASCADE'); # 外部キー制約をつける

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
