<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFieldOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('form_field_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('key');

			$table->integer('form_field_id')->unsigned();
			$table->foreign('form_field_id')->references('id')->on('form_fields');

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
		Schema::drop('form_field_options');
	}

}
