<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileComment extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'file_id',
		'file_comment_id',
		'user_id',
		'comment'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function file () {
    	return $this->belongsTo('App\File');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function comments () {
		return $this->belongsToMany('App\FileComment');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user () {
		return $this->belongsTo('App\User');
    }
}
