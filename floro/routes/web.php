<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);
Route::get('/','UserController@home');
Route::resource('users','UserController');
Route::get('/users', 'UserController@show');
Route::get('/users/{user}','UserController@destroy');
Route::post('/users/create','UserController@create');
Route::get('/search','UserController@search');
Route::get('/export_excel/excel','ExportExcelController@excel')->name('export_excel.excel');
Route::get('/2fa','PasswordSecurityController@show2faForm')->name('2fa');
Route::post('/generate2faSecret','PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/2fa','PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa','PasswordSecurityController@disable2fa')->name('disable2fa');
Route::post('/2faVerify', function () {
    return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
