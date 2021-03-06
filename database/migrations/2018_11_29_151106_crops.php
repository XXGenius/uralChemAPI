<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Crops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('profile_id')->unsigned()->default(0);
            $table->foreign('profile_id')
                ->references('id')->on('profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        //
    }
}
