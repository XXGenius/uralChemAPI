<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('summary');
            $table->string('volume');
            $table->string('satisfied');
            $table->string('comment');
            $table->integer('goal_id')->unsigned()->default(0);
            $table->foreign('goal_id')
                ->references('id')->on('goals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('product_id')->unsigned()->default(0);
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('purchase_method_id')->unsigned()->default(0);
            $table->foreign('purchase_method_id')
                ->references('id')->on('purchase_methods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('supplier_id')->unsigned()->default(0);
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
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
