<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForwardHits extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forward_hits', function($table)
        {
            $table->increments('id');
            $table->integer('forward_id');
            $table->string('ip');
            $table->string('referrer');
            $table->string('browser');
            $table->string('os');
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
