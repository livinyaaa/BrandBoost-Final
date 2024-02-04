<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsTable extends Migration
{
    public function up()
{
    Schema::create('analytics', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('promotion_id')->unique();
        $table->integer('total_promotions');
        $table->integer('total_views');
        $table->float('average_view_count', 8, 2);
        $table->float('average_session_duration', 8, 2);
        $table->timestamps();
    });

    Schema::table('analytics', function (Blueprint $table) {
        $table->foreign('promotion_id')->references('id')->on('promotions');
    });
}


    public function down()
    {
        Schema::dropIfExists('analytics');
    }
}