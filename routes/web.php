<?php

//asset
Route::get('/','AssetController@index')->name('index');
Route::post('/asset/save','AssetController@saveAsset')->name('save.asset');
Route::get('/edit/asset/{id}', 'AssetController@getEditAsset')->name('edit.asset');
Route::post('/edit/asset/{id}', 'AssetController@edit')->name('edit.asset');
Route::get('/get/offices/{value}', 'AssetController@getOffices');
Route::get('/asset/delete/{id}', 'AssetController@deleteAsset')->name('delete.asset');
Route::get('view/asset/{id}', 'AssetController@viewAsset')->name('view.asset');

//location
Route::get('/asset/location','LocationController@location')->name('location');
Route::post('/asset/save/location','LocationController@savelocation')->name('save.location');
Route::get('/asset/delete/location/{id}','LocationController@deleteLocation')->name('delete.location');
Route::get('/asset/edit/location/{id}','LocationController@getEdit')->name('edit.location');
Route::post('/asset/edit/location/{id}','LocationController@edit')->name('edit.location');
Route::get('/asset/view/location/{id}','LocationController@viewLocation')->name('view.location');

//office
Route::get('/asset/office','LocationController@Office')->name('office');
Route::post('/asset/save/office', 'LocationController@saveOffice')->name('office.save');
Route::get('/asset/edit/office/{id}', 'LocationController@getEditOff')->name('offece.edit');
Route::post('/asset/edit/office/{id}', 'LocationController@editOffice')->name('offece.edit');
Route::get('/asset/delete/office/{id}', 'LocationController@deleteOffice')->name('office.delete');
Route::get('/asset/view/office/{id}', 'LocationController@viewOffice')->name('office.view');


//issues
Route::get('/issues' , 'IssueController@getIssue')->name('issue');
Route::get('/search', 'IssueController@search')->name('search');
Route::post('/report', 'IssueController@report')->name('report.issue');
Route::get('/assign/users', 'IssueController@getAssign')->name('get.assign');
Route::post('/myBtn/{id}', 'IssueController@assign')->name('assign');
// Route::get('/test' , 'IssueController@test')->name('test');

//users
Route::get('/register', 'UserController@regForm')->name('register');
Route::Post('/register', 'UserController@store')->name('register');
Route::get('/dashbaord', 'UserController@getDashbaord')->name('dashbaord');
Route::get('/login', 'UserController@getLogin')->name('login');
Route::post('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/users/all', 'UserController@getUsers')->name('users.all');

//services
Route::get('/services', 'ServiceController@service')->name('services');
Route::post('/service/save','ServiceController@saveService')->name('save.service');
Route::get('/edit/service/{id}', 'ServiceController@getEditService')->name('get.edit.service');
Route::post('/edit/service/{id}', 'ServiceController@edit')->name('edit.service');



