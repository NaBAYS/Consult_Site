<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'short_name',
		'long_name',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function files() {
		return $this->hasMany('App\File');
	}
}
