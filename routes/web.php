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

    //deletion file get routes
    Route::get('/equipment-deletions/{deletion}/files', 'DeletionFileController@create')->name('deletion-file-create');
    Route::get('/equipment-deletions/{deletion}/files/{file}', 'DeletionFileController@edit')->name('deletion-file-edit');

    //EquipmentDeletion get routes
    Route::get('/equipment/{equipment}/deletions', 'EquipmentDeletionController@create')->name('equipment-deletion-create');
    Route::get('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@show')->name('equipment-deletion-show');
    Route::get('/equipment/{equipment}/deletions/{deletion}/edit', 'EquipmentDeletionController@edit')->name('equipment-deletion-edit');


    //equipment repair files get routes
    Route::get('/repairs/{repair}/files', 'RepairFileController@create')->name('equipment-repair-file-create');

    //equipment repair get routes

    Route::get('/equipment/{equipment}/repairs', 'EquipmentRepairController@create')->name('equipment-repair-create');
    Route::get('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@show')->name('equipment-repair-show');
    Route::get('/equipment/{equipment}/repairs/{repair}/edit', 'EquipmentRepairController@edit')->name('equipment-repair-edit');

    //equipment owner get routes
    Route::get('/equipment/{equipment}/owners/create', 'EquipmentOwnerController@create')->name('equipment-owner-change');
    Route::get('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@show')->name('equipment-owner-show');
    Route::get('/equipment/{equipment}/owners/{owner}/add-file', 'EquipmentOwnerController@addFileCreate')
        ->name('equipment-owner-add-file');

    Route::get('/equipment/{equipment}/owners/{owner}/edit', 'EquipmentOwnerController@edit')->name('equipment-owner-edit');


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
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

//deletion file post routes
Route::post('/equipment-deletions/{deletion}/files', 'DeletionFileController@store')->name('deletion-file-store');
Route::patch('/equipment-deletions/{deletion}/files/{file}', 'DeletionFileController@update')->name('deletion-file-update');
Route::delete('/equipment-deletions/files/{file}', 'DeletionFileController@destroy')->name('deletion-file-destroy');

//EquipmentDeletion post routes
Route::post('/equipment/{equipment}/deletions', 'EquipmentDeletionController@store')->name('equipment-deletion-store');
Route::patch('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@update')->name('equipment-deletion-update');
Route::delete('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@destroy')->name('equipment-deletion-delete');



//equipment repair file post routes
Route::post('/repairs/{repair}/files', 'RepairFileController@store')->name('repair-file-store');
Route::delete('/repairs/{repair}/files/{file}', 'RepairFileController@destroy')->name('repair-file-delete');


//equipment repair post routes
Route::post('/equipment/{equipment}/repair', 'EquipmentRepairController@store')->name('equipment-repair-store');
Route::delete('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@destroy')->name('equipment-repair-delete');
Route::patch('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@update')->name('equipment-repair-update');

//equipment owner post routes
Route::post('/equipment/{equipment}/owner/', 'EquipmentOwnerController@store')->name('equipment-owner-store');
Route::patch('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@update')->name('equipment-owner-update');
Route::post('/equipment/{equipment}/owners/{owner}/add-file', 'EquipmentOwnerController@addFileStore')->name('owner-file-store');
Route::delete('/files/{file}', 'EquipmentOwnerController@deleteFile')->name('owner-file-delete');
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





