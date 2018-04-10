<?php

namespace App\Http\Controllers;

use App\File;
use App\FileComment;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JavaScript;
use Storage;

class FileController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index () {
	    $user = Auth::user();

	    // Authenticated
	    if ( $user ) {
		    $files = File::paginate( 10 );

		    $variables = [
			    'files' => $files
		    ];

		    return view( 'files.index', $variables );
	    }

	    // Unauthenticated
	    return view( 'index' );
    }

	/**
	 * @param File $file
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show (File $file) {
		$variables = [
			'file' => $file,
		];

		JavaScript::put([
			'comments' => $file->comments->load('user'),
			'file' => $file,
			'userId' => Auth::user()->id
		]);

		return view('files.show', $variables);
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

		$file->download_count = (int)$file->download_count + 1;
		$file->save();

		return response()->download( $path, $dl_name, $headers );
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function search( Request $request ) {
		$query       = File::query();
		$text_search = $request->get( 'text_search' );
		$tags        = $request->get( 'tags' );
		$category    = $request->get( 'categories' );

		if ( $text_search ) {
			$query->where( 'name', 'LIKE', '%' . $text_search . '%' )
			      ->orWhere( 'description', 'LIKE', '%' . $text_search . '%' );
		}

		if ( $tags ) {
			$query->whereHas( 'tags', function ( $query ) use ( $tags ) {
				$query->whereIn( 'file_tags.id', $tags );
			} );
		}

		if ($category) {
			$query->where('file_category_id', $category);
		}

		$variables = [
			'files' => $query->paginate( 10 )
		];

		return view( 'files.index', $variables );
	}

	/**
	 * @param Request $request
	 * @param File $file
	 * @param FileComment|null $file_comment
	 *
	 * @return mixed
	 * @throws \Exception
	 * @throws \Throwable
	 */
	public function comment (Request $request, File $file, FileComment $file_comment = null) {
		return \DB::transaction(function () use ($request, $file, $file_comment) {
			$requestArr = $request['request'];
			$comment_body = null;

			foreach ($requestArr as $arr) {
				if ($arr['name'] === 'comment') {
					$comment_body = $arr['value'];
				}
			}

			return FileComment::create([
				'file_id' => $file->id,
				'user_id' => Auth::user()->id,
				'comment' => $comment_body
			])->load('user');
		});
	}

	public function fileVote (Request $request, File $file) {

	}
}
