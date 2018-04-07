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
			$table->integer( 'file_id' );
			$table->integer( 'file_comment_id' )->nullable()->default( null );
			$table->integer( 'user_id' );
			$table->text( 'comment' );
			$table->integer('votes')->default(0);
			$table->timestamps();
			$table->softDeletes();
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
