<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowStepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workflow_steps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_type')->nullable();

			$table->integer('workflow_id')->unsigned();
			$table->foreign('workflow_id')->references('id')->on('workflows');

			$table->integer('form_id')->unsigned();
			$table->foreign('form_id')->references('id')->on('forms');
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
		Schema::drop('workflow_steps');
	}

}
