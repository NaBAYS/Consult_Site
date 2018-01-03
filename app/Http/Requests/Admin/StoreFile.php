<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		$user = \Auth::user();

		if ( $user->isAdmin() ) {
			return true;
		}

		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$action_method = $this->route()->getActionMethod();
		$rules         = [
			'name'             => 'required',
			'description'      => 'required',
			'file_category_id' => 'required',
		];

		if ( $action_method === 'store' ) {
			$rules['file_upload'] = 'required';
		}

		return $rules;
	}

	/**
	 * Configure the validator instance.
	 *
	 * @param  \Illuminate\Validation\Validator $validator
	 *
	 * @return void
	 */
	public function withValidator( $validator ) {
		$validator->after( function ( $validator ) {
			$action_method = $this->route()->getActionMethod();

			if ( $action_method === 'update' ) {
				$file = $this->route( 'file' );

				// Check if file exists
				if ( ! \Storage::disk( $file->location )->exists( $file->file_path ) ) {
					$validator->errors()->add( 'file_upload', 'asdf' );
				}
			}
		} );
	}
}
