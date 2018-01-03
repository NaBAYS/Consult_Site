<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\FileCategory;
use App\FileTag;
use App\Http\Requests\Admin\StoreFile;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class FileController extends Controller {

	/**
	 * File storage directory
	 *
	 * @var string
	 */
	protected $file_dir = 'assets';

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$variables = [
			'files'      => File::paginate( 25 ),
			'categories' => FileCategory::all()->mapWithKeys( function ( $item ) {
				return [ $item->id => $item->long_name ];
			} )->toArray()
		];

		return view( 'admin.activities.files.index', $variables );
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view( 'admin.activities.files.create' );
	}

	/**
	 * @param StoreFile $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 * @throws \Throwable
	 */
	public function store( StoreFile $request ) {
		return DB::transaction( function () use ( $request ) {
			$upload    = $request->file( 'file_upload' );
			$extension = $upload->getClientOriginalExtension();
			$folder    = FileCategory::find( $request->input( 'file_category_id' ) )->short_name;

			$file_path = $upload->store( '/' . $folder . '/' . $extension, $this->file_dir );

			$file = File::create( [
				'name'             => $request->input( 'name' ),
				'description'      => $request->input( 'description' ),
				'file_path'        => $file_path,
				'file_type'        => $extension,
				'file_category_id' => $request->input( 'file_category_id' ),
				'location'         => $this->file_dir,
			] );

			$file->tags()->sync( $request->input( 'tags' ) );

			return redirect()->route( 'admin.file.index' );
		} );
	}

	/**
	 * @param File $file
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit( File $file ) {
		$variables = [
			'file' => $file,
		];

		return view( 'admin.activities.files.edit', $variables );
	}

	/**
	 * @param StoreFile $request
	 * @param File $file
	 *
	 * @return mixed
	 * @throws \Exception
	 * @throws \Throwable
	 */
	public function update( StoreFile $request, File $file ) {
		return DB::transaction( function () use ( $request, $file ) {
			$upload = $request->file( 'file_upload' );

			$file->name             = $request->input( 'name' );
			$file->description      = $request->input( 'description' );
			$file->file_category_id = $request->input( 'file_category_id' );

			if ( $upload ) {
				$file_exists = Storage::disk( $file->location )->exists( $file->file_path );

				if ( $file_exists ) {
					Storage::disk( $file->location )->delete( $file->file_path );
				}

				$extension = $upload->getClientOriginalExtension();
				$folder    = FileCategory::find( $request->input( 'file_category_id' ) )->short_name;
				$file_path = $upload->store( '/' . $folder . '/' . $extension, $this->file_dir );

				$file->file_path = $file_path;
				$file->file_type = $extension;
				$file->location = $this->file_dir;
			}

			$file->save();

			$file->tags()->sync( $request->input( 'tags' ) );

			return redirect()->route( 'admin.file.index' );
		} );

	}

	/**
	 * @param File $file
	 *
	 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	public function download( File $file ) {
		$path    = Storage::disk( $file->location )->path( $file->file_path );
		$type    = Storage::disk( $file->location )->mimeType( $file->file_path );
		$dl_name = kebab_case( $file->name ) . '-' . Carbon::now()->format( 'm-d-Y' ) . '.' . $file->file_type;
		$headers = [ 'Content-Type: ' . $type ];

		return response()->download( $path, $dl_name, $headers );
	}

	/**
	 * @param File $file
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function view( File $file ) {
		$path    = Storage::disk( $file->location )->path( $file->file_path );
		$type    = Storage::disk( $file->location )->mimeType( $file->file_path );
		$dl_name = kebab_case( $file->name ) . '-' . Carbon::now()->format( 'm-d-Y' ) . '.' . $file->file_type;
		$headers = [ 'Content-Type: ' . $type ];

		return response()->file( $path, $headers );
	}
}
