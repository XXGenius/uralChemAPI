<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questionnaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client');
            $table->integer('area');
            $table->string('address');
            $table->string('parent_company');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('contact_id')->unsigned()->default(0);
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('general_id')->unsigned()->default(0);
            $table->foreign('general_id')
                ->references('id')->on('general')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('report_id')->unsigned()->default(0);
            $table->foreign('report_id')
                ->references('id')->on('reports')
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
