<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class General extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('company_id')->unsigned()->default(0);
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('profile_id')->unsigned()->default(0);
            $table->foreign('profile_id')
                ->references('id')->on('profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('crop_id')->unsigned()->default(0);
            $table->foreign('crop_id')
                ->references('id')->on('crops')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('branch_id')->unsigned()->default(0);
            $table->foreign('branch_id')
                ->references('id')->on('branches')
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
