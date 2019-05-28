<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('user',128);
            $table->decimal('total',8,2);
            $table->decimal('additional_hour',8,2)->nullable();
            $table->decimal('additional_people',8,2);
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->integer('discount')->nullable();
            $table->integer('status')->unsigned();
            $table->integer('people')->unsigned();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_events');
    }
}
