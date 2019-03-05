<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('projects', 'ProjectsController');

    //equipment owner get routes
    Route::get('/equipment/{equipment}/owners/create', 'EquipmentOwnerController@create')->name('equipment-owner-change');
    Route::get('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@show')->name('equipment-owner-show');


    //campuses post routes
    Route::get('/campuses', 'CampusController@index');
    Route::get('/campuses/create', 'CampusController@create');
    Route::get('/campuses/{campus}', 'CampusController@show');
    Route::get('/campuses/{campus}/edit', 'CampusController@edit');

    //equipment get routes
    Route::get('/equipment', 'EquipmentController@index')->name('equipment-index');
    Route::get('/equipment/create', 'EquipmentController@create')->name('equipment-create');
    Route::get('/equipment/{equipment}/edit', 'EquipmentController@edit')->name('equipment-edit');
    Route::get('/equipment/{equipment}', 'EquipmentController@show')->name('equipment-show');

    //equipmenttypes get
    Route::get('/equipmenttypes', 'EquipmenttypeController@index')->name('equipmenttype-index');
    Route::get('/equipmenttypes/create', 'EquipmenttypeController@create')->name('equipmenttype-create');
    Route::get('/equipmenttypes/{equipmenttype}/edit', 'EquipmenttypeController@edit')->name('equipmenttype-edit');
    Route::get('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@show')->name('equipmenttype-show');


    //Rooms get routes
    Route::get('/rooms', 'RoomController@index')->name('room-index');
    Route::get('/rooms/create', 'RoomController@create')->name('room-create');
    Route::get('/rooms/{room}', 'RoomController@show')->name('room-show');
    Route::get('/rooms/{room}/edit', 'RoomController@edit')->name('room-edit');


    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/tasks/{task}', 'ProjectTasksController@update');
    Auth::routes();
});

//equipment owner post routes
Route::post('/equipment/{equipment}/owner/', 'EquipmentOwnerController@store')->name('equipment-owner-store');
Route::delete('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@destroy')->name('equipment-owner-delete');

//equipment post routes
Route::post('/equipment', 'EquipmentController@store')->name('equipment-store');
Route::patch('/equipment/{equipment}', 'EquipmentController@update')->name('equipment-update');
Route::delete('/equipment/{equipment}', 'EquipmentController@destroy')->name('equipment-delete');

//equipment-type post routes
Route::post('/equipmenttypes', 'EquipmenttypeController@store')->name('equipmenttype-store');
Route::patch('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@update')->name('equipmenttype-update');
Route::delete('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@destroy')->name('equipmenttype-delete');

//Rooms post routes
Route::post('/rooms', 'RoomController@store')->name('room-store');
Route::patch('/rooms/{room}', 'RoomController@update')->name('room-update');
Route::delete('/rooms/{room}', 'RoomController@destroy')->name('room-destroy');


//campuses post routes
Route::post('/campuses', 'CampusController@store')->name('campus-create');
Route::patch('/campuses/{campus}', 'CampusController@update');
Route::delete('/campuses/{campus}', 'CampusController@destroy');


Route::post('/equipment/{equipment}/transactions', 'EquipmentTransactionController@store');
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


