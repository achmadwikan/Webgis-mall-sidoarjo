<?php

$this->get('/', 'LandingPageController@index');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');
Route::name('auth.confirm')->get('/register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm');

// REgister Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.regis');
$this->post('register', 'Auth\RegisterController@register')->name('auth.regis');


// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('mall', 'MallController');
    Route::resource('polygon', 'PolygonController');

    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('kelurahan', 'KelurahanController');

});


//$this->post('change_password', 'ProfileController@updatePassword')->name('auth.change_password');