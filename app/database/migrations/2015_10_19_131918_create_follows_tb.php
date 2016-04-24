<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowsTb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('follows', function(Blueprint $table) {
	  $table->increments('id');
	  $table->integer('type');
      $table->integer('type_id')->unsigned();
      $table->integer('user_id')->unsigned();
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
   	  Schema::drop('follows');
	}

}
