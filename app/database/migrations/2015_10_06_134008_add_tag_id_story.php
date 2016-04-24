<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagIdStory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story', function($table)
		  {
		    $table->integer('tag_id')->nullable();
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
	   	  $t->dropColumn('tag_id');
	   });
	}

}
