<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecCountStoryTb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story', function($table)
		  {
		    $table->integer('rec_count')->default(0);
		  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story',function($t)
	   {
	   	  $t->dropColumn('rec_count');
	   });
	}

}
