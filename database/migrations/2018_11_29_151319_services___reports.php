<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services__reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned()->default(0);
            $table->foreign('service_id')
                ->references('id')->on('services')
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
