<?php

namespace App;

use App\Helpers\UserHelper;
use Illuminate\Notifications\Notifiable;

class User extends UserHelper
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
	    'user_name',
	    'email',
	    'role_id',
	    'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function role () {
    	return $this->hasOne('App\Role');
    }
}
