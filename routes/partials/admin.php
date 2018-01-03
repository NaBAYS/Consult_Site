<?php

Route::group( [ 'prefix' => 'admin' ], function () {
	Route::get( '/', 'DashboardController@admin' )->name( 'admin.dashboard' );

	Route::group( [ 'namespace' => 'Admin' ], function () {
		Route::group( [ 'prefix' => 'user' ], function () {
			Route::get( '/', 'UserController@index' )->name( 'admin.user.index' );

			Route::get( 'create', 'UserController@create' )->name( 'admin.user.create' );
			Route::post( 'store', 'UserController@store' )->name( 'admin.user.store' );

			Route::get('{user}/edit', 'UserController@edit')->name('admin.user.edit');
			Route::put('{user}/update', 'UserController@update')->name('admin.user.update');
		} );

		Route::group( [ 'prefix' => 'file' ], function () {
			Route::get( '/', 'FileController@index' )->name( 'admin.file.index' );

			Route::get( 'create', 'FileController@create' )->name( 'admin.file.create' );
			Route::post( 'store', 'FileController@store' )->name( 'admin.file.store' );

			Route::get( '{file}/edit', 'FileController@edit' )->name( 'admin.file.edit' );
			Route::put( '{file}/update', 'FileController@update' )->name( 'admin.file.update' );

			Route::get( '{file}/view', 'FileController@view' )->name( 'admin.file.view' );
		} );
	} );
} );