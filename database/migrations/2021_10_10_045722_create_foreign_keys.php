<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donation_request_id')->references('id')->on('donation_requests')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('contact_us', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('clientables', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_blood_type_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_blood_type_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_client_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_city_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donation_request_id_foreign');
		});
		Schema::table('contact_us', function(Blueprint $table) {
			$table->dropForeign('contact_us_client_id_foreign');
		});
		Schema::table('clientables', function(Blueprint $table) {
			$table->dropForeign('clientables_client_id_foreign');
		});
	}
}