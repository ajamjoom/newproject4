<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up(){
		
		Schema::create('answers', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        // Most tables start off this way
        $table->increments('id');

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();
        //FK to link to answers to questions!!
        $table->foreign('question_id')->references('id')->on('questions');
        $table->LONGBLOB('Answer');


        

    });
			}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}
