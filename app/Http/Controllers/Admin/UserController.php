<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$variables = [
			'users' => $this->getUsers()
		];

		return view( 'admin.users.index', $variables );
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view( 'admin.users.create' );
	}

	/**
	 * @param StoreUser $request
	 *
	 * @return mixed
	 * @throws \Exception
	 * @throws \Throwable
	 */
	public function store( StoreUser $request ) {
		return \DB::transaction(function () use ($request) {
			User::create( [
				'first_name' => $request->get('first_name'),
				'last_name' => $request->get('last_name'),
				'email' => $request->get('email'),
				'user_name' => $request->get('user_name'),
				'role_id' => $request->get('role_id'),
				'password' => \Hash::make(str_random() . rand(1000,9999))
			] );

			$message = [
				'status' => 'success',
				'message' => 'User succesfully created.'
			];

			return redirect()->route('admin.user.index')->with('message', $message);
		});
	}

	/**
	 * @param User $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit (User $user) {
		$variables = [
			'user' => $user
		];

		return view('admin.users.edit', $variables);
	}

	/**
	 * @param StoreUser $request
	 * @param User $user
	 *
	 * @return mixed
	 * @throws \Exception
	 * @throws \Throwable
	 */
	public function update (StoreUser $request, User $user) {
		return \DB::transaction(function () use ($request, $user) {
			$user->first_name = $request->get('first_name');
			$user->last_name = $request->get('last_name');
			$user->email = $request->get('email');
			$user->user_name = $request->get('user_name');
			$user->role_id = $request->get('role_id');
			$user->save();

			$message = [
				'status' => 'success',
				'message' => 'User succesfully updated.'
			];

			return redirect()->route('admin.user.index')->with('message', $message);
		});
	}

	/**
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	private function getUsers() {
		$users = User::query();

		return $users->paginate( 15 );
	}
}
