<?php

namespace App\Helpers;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserHelper extends Authenticatable {

	/**
	 *  Check if user is admin
	 *
	 * @return bool
	 */
	public function isAdmin () {
		$role = Role::where('id', $this->role_id)->first();

		if ($role) {
			return in_array($role->short_name, ['super']);
		}

		return false;
	}

}