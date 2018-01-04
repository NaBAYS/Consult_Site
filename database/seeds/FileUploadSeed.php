<?php

use App\File;
use App\FileCategory;
use App\FileTag;
use Illuminate\Database\Seeder;

class FileUploadSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$location  = 'assets';
		$file_type = 'jpg';

		// Create file uploads
		for ( $i = 0; $i < 15; $i ++ ) {
			$name          = 'file_number_' . $i;
			$description   = 'Lorem ipsum dolor sit amet ... ' . $i . ' ' . str_random();
			$file_category = FileCategory::all()->random();
			$file_tags     = FileTag::all()->random( 2 );
			$file_path     = $file_category->short_name . '/' . $file_type . '/' . str_random( 10 ) . '.' . $file_type;


			$file = File::create( [
				'name'             => $name,
				'description'      => $description,
				'file_path'        => $file_path,
				'file_type'        => $file_type,
				'file_category_id' => $file_category->id,
				'location'         => $location,
			] );

			$file->tags()->sync( $file_tags->pluck( 'id' )->toArray() );
		}
	}
}
