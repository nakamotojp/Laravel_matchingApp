<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFix2ToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userevents', function (Blueprint $table) {
            $table->bigInteger('event_id')->unsigned()->change();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->change();
            $table->dropColumn('reserve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userevents', function (Blueprint $table) {
            
        });
    }
}
