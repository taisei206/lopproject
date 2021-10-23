<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dream');//目的か夢
            $table->text('dreamwhy')->nullable();//なぜその夢なのか
            $table->text('dreamdo')->nullable();//そのためになにをしているのか
            $table->text('nowdo')->nullable();//今はなにをしているのか
            $table->text('nowwhy')->nullable();//なぜ今それをやっているのか
            $table->text('tovisitor')->nullable();//見た人へ言葉
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
        Schema::dropIfExists('lops');
    }
}
