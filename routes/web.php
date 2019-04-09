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

    //departments get routes
    Route::get('/departments/create', 'DepartmentController@create')->name('department-create')->middleware('permission:create');
    Route::get('/departments/{department}/edit', 'DepartmentController@edit')->name('department-edit')->middleware('permission:update');
    Route::get('/departments/{department}', 'DepartmentController@show')->name('department-show')->middleware('permission:view');
    Route::get('/departments', 'DepartmentController@index')->name('department-index')->middleware('permission:view');


    //deletion file get routes
    Route::get('/equipment-deletions/{deletion}/files', 'DeletionFileController@create')->name('deletion-file-create')->middleware('permission:create');
    Route::get('/equipment-deletions/{deletion}/files/{file}', 'DeletionFileController@edit')->name('deletion-file-edit')->middleware('permission:update');

    //EquipmentDeletion get routes
    Route::get('/equipment/{equipment}/deletions', 'EquipmentDeletionController@create')->name('equipment-deletion-create')->middleware('permission:create');
    Route::get('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@show')->name('equipment-deletion-show')->middleware('permission:view');
    Route::get('/equipment/{equipment}/deletions/{deletion}/edit', 'EquipmentDeletionController@edit')->name('equipment-deletion-edit')->middleware('permission:update');


    //equipment repair files get routes
    Route::get('/repairs/{repair}/files', 'RepairFileController@create')->name('equipment-repair-file-create')->middleware('permission:create');

    //equipment repair get routes

    Route::get('/equipment/{equipment}/repairs', 'EquipmentRepairController@create')->name('equipment-repair-create')->middleware('permission:create');
    Route::get('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@show')->name('equipment-repair-show')->middleware('permission:view');
    Route::get('/equipment/{equipment}/repairs/{repair}/edit', 'EquipmentRepairController@edit')->name('equipment-repair-edit')->middleware('permission:update');

    //equipment owner get routes
    Route::get('/equipment/{equipment}/owners/create', 'EquipmentOwnerController@create')->name('equipment-owner-change')->middleware('permission:create');
    Route::get('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@show')->name('equipment-owner-show')->middleware('permission:view');
    Route::get('/equipment/{equipment}/owners/{owner}/add-file', 'EquipmentOwnerController@addFileCreate')
        ->name('equipment-owner-add-file')->middleware('permission:create');

    Route::get('/equipment/{equipment}/owners/{owner}/edit', 'EquipmentOwnerController@edit')->name('equipment-owner-edit')->middleware('permission:update');


    //campuses get routes
    Route::get('/campuses', 'CampusController@index')->middleware('permission:view');
    Route::get('/campuses/create', 'CampusController@create')->middleware('permission:create');
    Route::get('/campuses/{campus}', 'CampusController@show')->middleware('permission:view');
    Route::get('/campuses/{campus}/edit', 'CampusController@edit')->middleware('permission:update');

    //equipment get routes
    Route::get('/equipment', 'EquipmentController@index')->name('equipment-index')->middleware('permission:view');
    Route::get('/equipment/create', 'EquipmentController@create')->name('equipment-create')->middleware('permission:create');
    Route::get('/equipment/{equipment}/edit', 'EquipmentController@edit')->name('equipment-edit')->middleware('permission:update');
    Route::get('/equipment/{equipment}', 'EquipmentController@show')->name('equipment-show')->middleware('permission:view');

    //equipmenttypes get
    Route::get('/equipmenttypes', 'EquipmenttypeController@index')->name('equipmenttype-index')->middleware('permission:view');
    Route::get('/equipmenttypes/create', 'EquipmenttypeController@create')->name('equipmenttype-create')->middleware('permission:create');
    Route::get('/equipmenttypes/{equipmenttype}/edit', 'EquipmenttypeController@edit')->name('equipmenttype-edit')->middleware('permission:update');
    Route::get('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@show')->name('equipmenttype-show')->middleware('permission:view');


    //Rooms get routes
    Route::get('/rooms', 'RoomController@index')->name('room-index')->middleware('permission:view');
    Route::get('/rooms/create', 'RoomController@create')->name('room-create')->middleware('permission:create');
    Route::get('/rooms/{room}', 'RoomController@show')->name('room-show')->middleware('permission:view');
    Route::get('/rooms/{room}/edit', 'RoomController@edit')->name('room-edit')->middleware('permission:update');


    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->middleware('permission:create');
    Route::patch('/tasks/{task}', 'ProjectTasksController@update')->middleware('permission:update');
    Auth::routes();
});
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

//departments post routes
Route::patch('/departments/{department}', 'DepartmentController@update')->name('department-update')->middleware('permission:update');
Route::delete('/departments/{department}', 'DepartmentController@destroy')->name('department-delete')->middleware('permission:delete');
Route::post('/departments', 'DepartmentController@store')->name('department-store')->middleware('permission:create');


//deletion file post routes
Route::post('/equipment-deletions/{deletion}/files', 'DeletionFileController@store')->name('deletion-file-store')->middleware('permission:create');
Route::patch('/equipment-deletions/{deletion}/files/{file}', 'DeletionFileController@update')->name('deletion-file-update')->middleware('permission:update');
Route::delete('/equipment-deletions/files/{file}', 'DeletionFileController@destroy')->name('deletion-file-destroy')->middleware('permission:delete');

//EquipmentDeletion post routes
Route::post('/equipment/{equipment}/deletions', 'EquipmentDeletionController@store')->name('equipment-deletion-store')->middleware('permission:create');
Route::patch('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@update')->name('equipment-deletion-update')->middleware('permission:update');
Route::delete('/equipment/{equipment}/deletions/{deletion}', 'EquipmentDeletionController@destroy')->name('equipment-deletion-delete')->middleware('permission:delete');



//equipment repair file post routes
Route::post('/repairs/{repair}/files', 'RepairFileController@store')->name('repair-file-store')->middleware('permission:create');
Route::delete('/repairs/{repair}/files/{file}', 'RepairFileController@destroy')->name('repair-file-delete')->middleware('permission:delete');


//equipment repair post routes
Route::post('/equipment/{equipment}/repair', 'EquipmentRepairController@store')->name('equipment-repair-store')->middleware('permission:create');
Route::delete('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@destroy')->name('equipment-repair-delete')->middleware('permission:delete');
Route::patch('/equipment/{equipment}/repairs/{repair}', 'EquipmentRepairController@update')->name('equipment-repair-update')->middleware('permission:update');

//equipment owner post routes
Route::post('/equipment/{equipment}/owner/', 'EquipmentOwnerController@store')->name('equipment-owner-store')->middleware('permission:create');
Route::patch('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@update')->name('equipment-owner-update')->middleware('permission:update');
Route::post('/equipment/{equipment}/owners/{owner}/add-file', 'EquipmentOwnerController@addFileStore')->middleware('permission:create');
Route::delete('/files/{file}', 'EquipmentOwnerController@deleteFile')->name('owner-file-delete')->middleware('permission:delete');
Route::delete('/equipment/{equipment}/owners/{owner}', 'EquipmentOwnerController@destroy')->name('equipment-owner-delete')->middleware('permission:delete');

//equipment post routes
Route::post('/equipment', 'EquipmentController@store')->name('equipment-store')->middleware('permission:create');
Route::patch('/equipment/{equipment}', 'EquipmentController@update')->name('equipment-update')->middleware('permission:update');
Route::delete('/equipment/{equipment}', 'EquipmentController@destroy')->name('equipment-delete')->middleware('permission:delete');

//equipment-type post routes
Route::post('/equipmenttypes', 'EquipmenttypeController@store')->name('equipmenttype-store')->middleware('permission:create');
Route::patch('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@update')->name('equipmenttype-update')->middleware('permission:update');
Route::delete('/equipmenttypes/{equipmenttype}', 'EquipmenttypeController@destroy')->name('equipmenttype-delete')->middleware('permission:delete');

//Rooms post routes
Route::post('/rooms', 'RoomController@store')->name('room-store')->middleware('permission:create');
Route::patch('/rooms/{room}', 'RoomController@update')->name('room-update')->middleware('permission:update');
Route::delete('/rooms/{room}', 'RoomController@destroy')->name('room-destroy')->middleware('permission:delete');


//campuses post routes
Route::post('/campuses', 'CampusController@store')->name('campus-create')->middleware('permission:create');
Route::patch('/campuses/{campus}', 'CampusController@update')->middleware('permission:update');
Route::delete('/campuses/{campus}', 'CampusController@destroy')->middleware('permission:delete');





