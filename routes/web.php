<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Patient
    Route::delete('patients/destroy', 'PatientController@massDestroy')->name('patients.massDestroy');
    Route::resource('patients', 'PatientController');

    // Exams
    Route::delete('exams/destroy', 'ExamsController@massDestroy')->name('exams.massDestroy');
    Route::resource('exams', 'ExamsController');

    // Reagents
    Route::delete('reagents/destroy', 'ReagentsController@massDestroy')->name('reagents.massDestroy');
    Route::resource('reagents', 'ReagentsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::post('tests/media', 'TestsController@storeMedia')->name('tests.storeMedia');
    Route::post('tests/ckmedia', 'TestsController@storeCKEditorImages')->name('tests.storeCKEditorImages');
    Route::resource('tests', 'TestsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
