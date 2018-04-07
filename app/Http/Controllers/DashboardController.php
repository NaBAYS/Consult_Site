<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function index() {
		return redirect()->route('file');
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
