<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreControl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_control', function(Blueprint $table)
		{
			$table->increments('store_control_id');
            $table->string('store_name', 100);
            $table->integer('contact_account_id');
            $table->integer('numof_store_locations_licensed')->default(1);
            $table->integer('numof_devices_licensed')->default(5);
            $table->timestamp('license_start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('license_end_date');
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
		Schema::drop('store_control');
	}

}
