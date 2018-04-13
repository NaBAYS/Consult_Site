<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileCommentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'file_comments', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'file_id' )->unsigned();
			$table->integer( 'file_comment_id' )->unsigned()->nullable()->default( null );
			$table->integer( 'user_id' )->unsigned();
			$table->text( 'comment' );
			$table->integer('votes')->default(0);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('file_id')->references('id')->on('files');
			$table->foreign('file_comment_id')->references('id')->on('file_comments');
			$table->foreign('user_id')->references('id')->on('users');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'file_comments' );
	}
}
