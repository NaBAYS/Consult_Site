<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class DashboardController extends Controller {
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$user = \Auth::user();

		// Authenticated
		if ( $user ) {
			$files = File::paginate( 10 );

			$variables = [
				'files' => $files
			];

			return view( 'authenticated.index', $variables );
		}

		// Unauthenticated
		return view( 'index' );
	}

	public function search( Request $request ) {
		$query       = File::query();
		$text_search = $request->get( 'text_search' );

		if ( $text_search ) {
			$query->where( 'name', 'LIKE', '%' . $text_search . '%' )
			      ->orWhere( 'description', 'LIKE', '%' . $text_search . '%' );
		}

		$variables = [
			'files' => $query->paginate( 10 )
		];

		return view( 'authenticated.index', $variables );
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function admin() {
		$user = \Auth::user();

		// Admin
		if ( $user->isAdmin() ) {
			return view( 'admin.index' );
		}

		$message = [
			'status'  => 'success',
			'message' => 'You are not authorized to take this action.'
		];

		return redirect()->route( 'dashboard' )->with( 'message', $message );
	}
}
