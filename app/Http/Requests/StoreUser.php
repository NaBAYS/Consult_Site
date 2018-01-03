<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	$user = \Auth::user();

    	if ($user->isAdmin()) {
    	    return true;
	    }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
	        'role_id' => 'required',
	        'user_name' => 'required'
        ];
    }

	public function withValidator( $validator ) {
		$validator->after( function ( $validator ) {
			$action_method = $this->route()->getActionMethod();

			if ( $action_method === 'update' ) {
				$user = $this->route( 'user' );
				$new_email = $this->request->get('email');
				$new_username = $this->request->get('user_name');

				// Check if email exists
				$email = User::where('email', $new_email)->where('id', '!=', $user->id)->get();

				if ($email->count() > 0)
					$validator->errors()->add( 'email', 'The email has already been taken.' );

				// Check if user name exists
				$username = User::where('user_name', $new_username)->where('id', '!=', $user->id)->get();

				if ($username->count() > 0)
					$validator->errors()->add( 'user_name', 'The user name has already been taken.' );
			}
		} );
	}
}
