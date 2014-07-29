<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionUserPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_user', function($table) {
 
			# AI, PK
			# none needed
 
			# General data...
			$table->integer('question_id')->unsigned();
			$table->integer('user_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('question_id')->references('id')->on('questions');
			$table->foreign('user_id')->references('id')->on('users');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_user');
	}

}
