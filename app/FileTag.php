<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileTag extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'description',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function files() {
		return $this->belongsToMany('App\File');
	}
}
